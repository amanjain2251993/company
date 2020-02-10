	app.directive('sortIcon', function($timeout) {
    return {
        scope: {
            params: '=params',
        },
        template: function(elem, attr) {
            var isclass = "ng-class=\"params.order_by=='" + attr.orderBy + "' ? 'fa-sort-'+params.order_type : ''\"";
            return '<i class="fa fa-sort" ' + isclass + '></i>';
        },
        link: function(scope, elem, attr) {
            $(elem).click(function() {
                console.log(attr);
                console.log(scope);
                if (scope.params.order_by == attr.orderBy) {
                    scope.params.order_type = scope.params.order_type == 'asc' ? 'desc' : 'asc';
                } else {
                    scope.params.order_by = attr.orderBy;
                }
            });
        }

    };
});
app.directive('onErrorSrc', function() {
    return {
        link: function(scope, element, attrs) {
            element.bind('error', function() {
                if (attrs.src != attrs.onErrorSrc) {
                    attrs.$set('src', attrs.onErrorSrc);
                }
            });
        }
    }
});

