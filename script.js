
new DataTable('#example', {
    ajax: 'http://intanurul04.alwaysdata.net/bismillah_9/getcsv2json.php',
    columns: [
        { data: 'id' },
        { data: 'F_name' },
        { data: 'L_name"' },
        { data: 'email' },
        { data: 'email2' },
        { data: 'profesi' }
    ]
});

console.log(DataTable)