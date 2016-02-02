app.directive('gaiaSubmit', function() {
    return {
        restrict: 'E',
        replace: true,
        template: '<input type="submit" value="Processar Informações" class="btn btn-primary">',
        link: function(scope, element, attrs) {

        }
    };
});