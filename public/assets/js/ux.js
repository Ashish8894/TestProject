function storage(){
    if (typeof(Storage) !== "undefined") {
        //alert("Code for localStorage/sessionStorage.");
        return true;
    } else {
       // alert('Sorry! No Web Storage support..');
       return false;
    }
}
$(document).ready(function(){
    $('#openlookup').click(function(){
        $('#lookupbox').slideToggle();
    });
    $('#closelookup').click(function(){
        $('#lookupbox').slideUp();
    });
    $('.opentray').click(function(){
        $(".menutray").animate({left: '0'},'fast','swing');
    });
    $('.closetray').click(function(){
        $(".menutray").animate({left: '-100%'},'fast','swing');                     
    });
    $('.menutray td a').click(function(){
        $(".menutray").animate({left: '-100%'},'fast','swing');    
    });
     $(".sideline").on("swiperight",function(){
        $(".menutray").animate({left: '0'},'fast','swing');
    });
    $(".menutray").on("swipeleft",function(){
       $(".menutray").animate({left: '-100%'},'fast','swing');  
    });
    $('.menu').on('click', '.logoutbtn', function(e) {
        e.preventDefault();              
        localStorage.icduserid="";        
        localStorage.removeItem('user-details');
        localStorage.removeItem('subjectdata');
        localStorage.removeItem('fullsubjectdata');        
        localStorage.removeItem('topicdata');
        localStorage.removeItem('topicresdata');
        localStorage.removeItem('topicvideos');
        localStorage.removeItem('fulltestdata');
        localStorage.removeItem('topicfiles');
        localStorage.removeItem('sqdata');
        localStorage.removeItem('oqdata');
        localStorage.removeItem('questionstext');
        localStorage.removeItem('topicrankdata');
        localStorage.removeItem('sbtopicdata');
        localStorage.removeItem('sbtopicresdata');
        localStorage.removeItem('sbsqdata');
        localStorage.removeItem('sboqdata');        
        window.location.href="index.php?submit=logout";
    });
    $('.logoutbtn').click(function(e) {
        e.preventDefault();              
        localStorage.icduserid="";        
        localStorage.removeItem('user-details');
        localStorage.removeItem('subjectdata');
        localStorage.removeItem('fullsubjectdata');        
        localStorage.removeItem('topicdata');
        localStorage.removeItem('topicresdata');
        localStorage.removeItem('topicvideos');
        localStorage.removeItem('fulltestdata');
        localStorage.removeItem('topicfiles');
        localStorage.removeItem('sqdata');
        localStorage.removeItem('oqdata');
        localStorage.removeItem('questionstext');
        localStorage.removeItem('topicrankdata');
        localStorage.removeItem('sbtopicdata');
        localStorage.removeItem('sbtopicresdata');
        localStorage.removeItem('sbsqdata');
        localStorage.removeItem('sboqdata');        
        window.location.href="index.php?submit=logout";
    });
    $('#btnsync').on('click', function(e) {
        e.preventDefault();  
        var x = localStorage.icduserid;
        sync_getsujects(x);
        $('.loading').show();
        
    });
    $('#btnsync-mb').on('click', function(e) {
        e.preventDefault();  
        var x = localStorage.icduserid;
        sync_getsujects(x);
        $('.loading').show();
        
    });
    $('.mb-menu-cross').on('click', function(){
        $(".menutray").animate({left: '-100%'},'fast','swing');
    });
    function sync_getsujects(x){
        //$('#status').text('Fetching Contact...');
        localStorage.removeItem('subjectdata');
        $.post(jsonurl+"list_subjects.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('subjectdata', data);
            sync_getfullsujects(x);
        });
    } 
    function sync_getfullsujects(x){
        //$('#status').text('Fetching Contact...');
        localStorage.removeItem('fullsubjectdata');
        $.post(jsonurl+"list_full_subjects.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('fullsubjectdata', data);
            sync_getReviewReasons(x);
        });
    }
    function sync_getReviewReasons(x){
        //$('#status').text('Fetching Review Reasons...');
        localStorage.removeItem('reviewreasondata');
        $.post(jsonurl+"review_reason.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('reviewreasondata', data);
            sync_getQuestionReportReasons(x);
        });
    }
    function sync_getQuestionReportReasons(x){
        //$('#status').text('Fetching Question Report Reasons...');
        localStorage.removeItem('reportreasondata');
        $.post(jsonurl+"question_report_reason.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('reportreasondata', data);
            sync_getfiles(x);
        });
    }
    function sync_getfiles(x){
        //$('#status').text('Fetching Payment Details...');
        localStorage.removeItem('topicfiles');
        $.post(jsonurl+"list_files.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('topicfiles', data);
            sync_getfulltests(x);
        }); 
    }

    function sync_getfulltests(x){
        //$('#status').text('Fetching Markets...');
        localStorage.removeItem('fulltestdata');
        $.post(jsonurl+"list_full_test.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('fulltestdata', data);
            sync_gettopics(x);
            //checksession();
            
        });
    }
    function sync_gettopics(x){
        //$('#status').text('Topics...');
        localStorage.removeItem('topicdata');
        $.post(jsonurl+"list_topicx.php",
        {
            txtuserid: x
        },
        function(data, status){
            //var pdata = JSON.parse(data);
            localStorage.setItem('topicdata', data);
            sync_scount(x);
            
        });
    }

    function sync_scount(x){
        //$('#status').text('Subjective Questions ...');
        localStorage.removeItem('sqdata');
        $.post(jsonurl+"count_subjective.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('sqdata', data);
            sync_ocount(x);
        });
    }
    function sync_ocount(x){
        localStorage.removeItem('oqdata');
        //$('#status').text('Objective Questions ...');
        $.post(jsonurl+"count_objective.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('oqdata', data);
            sync_gettopicresults(x);
        });
    }
    function sync_gettopicresults(x){
        localStorage.removeItem('topicresdata');
        //$('#status').text('Finalising...');
        $.post(jsonurl+"gettopicresult.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('topicresdata', data);
            sync_getsbexams(x);
        });
    }

    /*** following api related to strong box ***/
    function sync_getsbexams(x){
        localStorage.removeItem('sbexamdata');
        //$('#status').text('Exams...');
        $.post(jsonurl+"sb_list_exam.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('sbexamdata', data);
            sync_getsbtopics(x);
            
        });
    }
    function sync_getsbtopics(x){
        localStorage.removeItem('sbtopicdata');
        //$('#status').text('Topics...');
        $.post(jsonurl+"sb_list_topics.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('sbtopicdata', data);
            sync_sbscount(x);
        });
    }

    function sync_sbscount(x){
        localStorage.removeItem('sbsqdata');
        //$('#status').text('Subjective Questions...');
        $.post(jsonurl+"sb_count_subjective.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('sbsqdata', data);
            sync_sbocount(x);
        });
    }

    function sync_sbocount(x){
        localStorage.removeItem('sboqdata');
        //$('#status').text('Objective Questions...');
        $.post(jsonurl+"sb_count_objective.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('sboqdata', data);
            sync_getsbtopicresults(x);
        });
    }
    function sync_getsbtopicresults(x){
        //$('#status').text('Finalising...');
        localStorage.removeItem('sbtopicresdata');
        $.post(jsonurl+"sb_topic_result.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('sbtopicresdata', data);
            sync_getLectures(x);
            
        });
    }
    function sync_getLectures(x){
        localStorage.removeItem('lectureMstdata');
        $.post(jsonurl+"get_lecture_mst.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('lectureMstdata', data);
            sync_getSteps();
        });
    }
    function sync_getSteps(x){
        localStorage.removeItem('stepsdata');
        $.post(jsonurl+"lecture_steps.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('stepsdata', data);
            sync_discoverStory(x);
        });
    }
    function sync_discoverStory(x){
        localStorage.removeItem('discoverstories');
        $.post(jsonurl+"list_stories.php",
        {
            txtuserid: x
        },
        function(data, status){
            localStorage.setItem('discoverstories', data);
            $('.loading').hide();
            window.location.href='index.php';
        });
    }
    /*** End ***/
    
});
