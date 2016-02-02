app.factory('CompraService', function($resource) {
    return $resource(
            PATH_API + 'compra/:id', {
                id: '@id'
            },
    {
        update: {
            method: 'PUT',
            url: PATH_API + 'compra/:id'
        }
    }
    );
});

app.factory('AutorService', function($resource) {
    return $resource(
            PATH_API + 'autor/:id', {
                id: '@id'
            },
    {
        update: {
            method: 'PUT',
            url: PATH_API + 'autor/:id'
        }
    }
    );
});