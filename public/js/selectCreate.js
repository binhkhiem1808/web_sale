

$(function(){
    $(".select-tag-choose").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })

    $(".select-category").select2({
            placeholder: "Select a state",
            allowClear: true
        });
});
