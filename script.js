
new DataTable('#example', {
    ajax: 'http://intanurul04.alwaysdata.net/bismillah_9/getcsv2json.php',
    columns: [
        { data: 'id' },
        { data: 'F_Name' },
        { data: 'L_Name"' },
        { data: 'email' },
        { data: 'email2' },
        { data: 'profesi' }
    ]
});

console.log(DataTable)