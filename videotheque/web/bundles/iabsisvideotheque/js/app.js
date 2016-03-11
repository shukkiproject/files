$('[value="DELETE"]').parents('form').on('submit', function(e) {
    if (!confirm("Voulez vous vriament supprimer cet enregistrement ?")) {
        e.preventDefault();
    };
});