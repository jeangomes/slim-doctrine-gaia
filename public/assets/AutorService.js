app.factory('AutorService', function($resource) {
    return $resource(
            'http://localhost/slim-doctrine/public/autor'
            );
});