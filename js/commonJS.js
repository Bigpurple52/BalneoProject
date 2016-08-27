function goDelete(btn) {
    var btnId = $(btn).parent().parent();
    var children = $(btnId).children();
    for (var i = 0; i < 3; i++) {
        var test = $(children)[i];
        var textNode = $(test).text();
        if (i === 0) {
            var activite = textNode;
        } else if (i === 1) {
            var start = textNode;
        } else if (i === 2) {
            var end = textNode;
        }
    }
    bootbox.confirm('Etes-vous sur de vouloir annuler la séance ' + activite + ': ' + start + ' - ' + end + ' . Vous pouvez annuler un cours que si cela est fait au moins 48H à l\'avance.', function (response) {
        if (response) {
            $.ajax({
                url: '../../src/controllers/AnnulerSeance.php',
                type: 'POST',
                data: {
                    event: activite,
                    start: start,
                    end: end
                },
                success: function (response) {
                    if (response === '1') {
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                        bootbox.alert('L\'annulation de votre séance a bien été prise en compte. Votre crédit vous a été restitué');
                    } else if (response === '0') {
                        bootbox.alert('Pour annuler une séance, vous devez vous y prendre au moins 48H à l\'avance.');
                    } else if (response === '2') {
                        bootbox.alert('L\'annulation de la séance n\'a pas fonctionné');
                    }
                }
            });
        }
    });
}

