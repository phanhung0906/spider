var casper = require("casper").create({
    viewportSize: {
        width: 1920,
        height: 1080
    },
    pageSettings: {
        webSecurityEnabled: false,
        loadImages: true,
        loadPlugins : false,
        userAgent: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'
    },
    /*onResourceRequested : function(R, req, net) {
        var match = req.url.match(/fbexternal-a\.akamaihd\.net\/safe_image|\.pdf|\.mp4|\.png|\.gif|\.avi|\.bmp|\.jpg|\.jpeg|\.swf|\.fla|\.xsd|\.xls|\.doc|\.ppt|\.zip|\.rar|\.7zip|\.gz|\.csv/gim);
        if (match !== null) {
            net.abort();
        }
    }*/
});

var crawler_api_url = 'http://api.spider.local/link-crawler';
var error_api_url = 'http://api.spider.local/link-crawler/error';
var currentPage = 1;
var utils = require('utils');
var save_api_url = "http://api.spider.local/product/create";
var url = '';
var website = '';
var site;
var data = {};

var fs = require('fs');
var lock_file_name = 'lock.txt';

function createLockFile() {
    var currentTime = new Date();
    var month = currentTime.getMonth() + 1;
    var day = currentTime.getDate();
    var year = currentTime.getFullYear();
    fs.write(lock_file_name, day + "-" + month + "-" + year, 'w');
}

function deleteLockFile() {
    fs.remove(lock_file_name);
}

function terminate() {
    deleteLockFile();
    casper.echo("Exiting..").exit();
}

function allDone() {
    deleteLockFile();
    casper.echo("All Done").exit();
}

var s = 0;
var sBase = 0;
function scroll() {
    casper.echo("Begin Scroll...");
    var sBase2 = casper.evaluate(function () { return document.body.scrollHeight; });
    if (sBase2 != sBase) {
        sBase = sBase2;
    }
    if (s> sBase) {
        s = 0;
        sBase = 0;
        return;
    }
    casper.echo("Scrolling...");
    casper.scrollTo(0, s);
    s += Math.min(sBase/20,400);
    casper.wait(1000, scroll);
}

casper.start('https://google.com');

casper.then(function() {
    if (fs.exists(lock_file_name)) {
        casper.echo("Have 1 Phantomjs process is running...").exit();
    } else {
        createLockFile();
    }
});

casper.on('error', function(msg,backtrace) {
    this.echo(msg);

    deleteLockFile();

    var currentTime = new Date();
    var month = currentTime.getMonth() + 1;
    var day = currentTime.getDate();
    var year = currentTime.getFullYear();
    fs.write('log.txt', day + "-" + month + "-" + year + ":" + msg, 'w');

    this.capture('error.png');

    // Call API Add Error
    data['msg'] = msg;
    jsonObject_fields = this.evaluate(function (error_api_url, data) {
        try {
            return JSON.parse(__utils__.sendAJAX(error_api_url, 'POST', JSON.stringify(data), false, {contentType: "application/json"}));
        } catch (e) {
            console.log("Error in fetching json object");
        }
    }, error_api_url, data);

    throw new ErrorFunc("fatal","error","filename",backtrace,msg);
});

casper.then(function() {
    data = this.evaluate(function(crawler_api_url) {
        return JSON.parse(__utils__.sendAJAX(crawler_api_url, 'GET', null, false));
    }, {crawler_api_url: crawler_api_url});

    casper.wait(5000, function () {
        this.echo('=================== Wait 5s ============================');
        url = data.list_url;
        website = data.website_name;
        utils.dump(data);
    });
});

casper.waitFor(function check() {
    return url != '';
}, function then() {
    casper.thenOpen(url, function() {
        this.echo("Now I'm in " + url);
        scroll();
    });
}, terminate);

casper.then(function() {
    site = require('./website/' + website);
    this.capture('0000.png');
    site.processPage();
});

casper.run();