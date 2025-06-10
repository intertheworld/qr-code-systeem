
$(document).ready(function () {
    $("#add_row").click(function () {
        var row = "<tr> <td><input type='text' name='name[]'></td> <td><input type='number' name='age[]'></td> <td><input type='button' value='Remove' class='rmv'></td> </tr>";
        $("#tbl tbody").append(row);
    });

    $("body").on("click", ".rmv", function () {
        $(this).closest("tr").remove();
    });
});


function submit() {
    const richting = $('#richting').val();
    const summary = $('#summaryID').html();
    const troeven = $('#troevenID').html();
    const toekomst = $('#toekomstID').html();

    // if (!richting || !summary || !troeven || !toekomst) {
    //     alert('Niet alle velden zijn ingevuld!');
    //     return;
    // }

    // fotos
    const mainPhotoInput = document.getElementById('hoofd-img');
    const advantagesPhotoInput = document.getElementById('advantages-img'); 
    const futurePhotoInput = document.getElementById('toekomst-img');

    // Collect table data
    let tableData = [];
    $('#tbl tbody tr').each(function () {
        const subject = $(this).find('input[name="name[]"]').val();
        const hours = $(this).find('input[name="age[]"]').val();
        if (subject && hours) { // Only include rows with data
            tableData.push({
                subject: subject,
                hours: hours
            });
        }
    });
    console.log(tableData);
    
    // Validate table data
    // if (tableData.length === 0) {
    //     alert('Please add at least one valid row in the table.');
    //     return;
    // }

    const formData = new FormData();
    formData.append('richting', richting);
    formData.append('summary', summary);
    formData.append('troeven', troeven);
    formData.append('toekomst', toekomst);

    formData.append('tableData', JSON.stringify(tableData)); // Append table data as JSON string
    
    // Append files to FormData if they exist
    if (mainPhotoInput && mainPhotoInput.files[0]) {
        formData.append('hoofd-img', mainPhotoInput.files[0]);
    }
    if (advantagesPhotoInput && advantagesPhotoInput.files[0]) {
        formData.append('advantages-img', advantagesPhotoInput.files[0]);
    }
    if (futurePhotoInput && futurePhotoInput.files[0]) {
        formData.append('toekomst-img', futurePhotoInput.files[0]);
    }

    $.ajax({
        url: "./includes/add-richting.php",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function () {
            console.log('add success');
            // location.href = './admin-museum.php';
        }
    });
}
