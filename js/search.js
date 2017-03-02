$(function() {
    var $rows = $('#utwory tbody tr');
    $('#szukajka').keyup(function() {

        var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
            reg = RegExp(val, 'i'),
            text;

        $rows.show().filter(function() {
            text = $(this).text().replace(/\s+/g, ' ');
            return !reg.test(text);
        }).hide();
    });
    console.log($rows);
    console.log("Działam");
    console.log("---------");
})
