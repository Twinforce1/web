$("#sbm").on("click", function () {
    let title = $("#title").val().trim();
    let description = $("#description").val().trim();
    let time = new Date();

    if (title.length < 3 || title.length > 30) {
        alert("Enter title in [3, 30]");
        return false;
    }

    if (description.length < 3 || description.length > 30) {
        alert("Enter description in [3, 30]");
        return false;
    }

    $.ajax({
        url: 'create.php',
        type: 'POST',
        cache: false,
        data: {'title': title, 'description': description, 'time': time},
        dataType: 'html',

        success: function () {
            alert("success");
        }
    })
})
