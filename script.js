$(document).ready(function(){
    $(".addButton").click(function(){
        $(".table").hide();
        $(".title").hide();
        $(".searchForm").hide();
        $(".addForm").show();
        $(".addButton").hide();
        $(".exitButton").hide();
        
    })
});

$(document).ready(function(){
    $(".updateButton").click(function(){
        $(".table").hide();
        $(".title").hide();
        $(".searchForm").hide();
        $(".updateForm").show();
        $(".addButton").hide();
        $(".exitButton").hide();
    })
});

$(document).ready(function(){
    $(".cancel").click(function(){
        $(".table").show();
        $(".title").show();
        $(".searchForm").show();
        $(".addForm").hide();
        $(".updateForm").hide();
        $(".addButton").show();
        $(".exitButton").show();
            
    })
});
