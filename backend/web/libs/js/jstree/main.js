function deleteCategoryConfirm(){
   return confirm("Are you sure want to delete this category!");
}

$(document).ready(function() {
    // 6 create an instance when the DOM is ready
    $('#jstree').jstree({
        "core" : {
            "themes" : {
                "variant" : "large"
            },
            'data' : {
                'url' : '/category/response',
                'data' : function (node) {
                    return { 'id' : node.id };
                }
            },
            "check_callback" : true
        },
        "plugins" : [ "dnd", "contextmenu", "search", 'unique', 'state' ],
        "contextmenu":{
            "items": function($node) {
                var tree = $("#jstree").jstree(true);
                return {
                    "Create": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "Create",
                        "action": function (obj) {
                            $node = tree.create_node($node);
                            tree.edit($node);
                        }
                    },
                    "Rename": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "Rename",
                        "action": function (obj) {
                            tree.edit($node);
                        }
                    },
                    "Remove": {
                        "separator_before": false,
                        "separator_after": false,
                        "label": "Delete",
                        "action": function (obj) {
                            if (deleteCategoryConfirm()) {
                                tree.delete_node($node);
                            }
                        }
                    }
                };
            }
        }
    }).on('create_node.jstree', function (e, data) {
        $.post('/category/response?operation=create_node', { 'parent' : data.node.parent, 'name' : data.node.text })
            .done(function (d) {
                data.instance.set_id(data.node, d.id);
            })
            .fail(function () {
                data.instance.refresh();
            });
    }).on('rename_node.jstree', function (e, data) {
        $.post('/category/response?operation=rename_node', { 'id' : data.node.id, 'name' : data.text })
            .fail(function () {
                data.instance.refresh();
            });
    }).on('delete_node.jstree', function (e, data) {
        $.post('/category/response?operation=delete_node', { 'id' : data.node.id})
            .fail(function () {
                data.instance.refresh();
            });
    }).on('move_node.jstree', function (e, data) {
        $.post('/category/response?operation=move_node', { 'id' : data.node.id, 'parent' : data.node.parent})
            .fail(function () {
                data.instance.refresh();
            });
    });

    var to = false;
    $('#plugins4_q').keyup(function () {
        if(to) { clearTimeout(to); }
        to = setTimeout(function () {
            var v = $('#plugins4_q').val();
            $('#jstree').jstree(true).search(v);
        }, 250);
    });

    $('#jstree').on('changed.jstree', function (e, data) {
        $('#jstree a.jstree-anchor').on('click', function () {
            var id = $(this).parent('li').attr('id');
            $('#currentCategoryId').text(id);
            //console.log(id);
        });
        //console.log(data.selected);
    });

    $('button.expand-all').on('click', function () {
        $('#jstree').jstree('open_all');
    });

    $('button.close-all').on('click', function () {
        $('#jstree').jstree('close_all');
    });
});