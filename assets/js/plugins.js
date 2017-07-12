

/*  SIDEBAR HIDE AND SHOW*/

  $(document).ready(function(){
    $('.main-sidebar-button').on('click', function(){
        if($('.main-sidebar').hasClass('hidden')){
            $('.main-sidebar').removeClass('hidden');
            $('.main-content').css({
                'marginLeft' : 250
            });  
        }else{
            $('.main-sidebar').addClass('hidden');
            $('.main-content').css({
                'marginLeft' : 0
            });    
        }
    });
  });

/* SIDEBAR MENU */

  $(document).ready(function () {
    $('.nav > li > a').click(function(){
      if ($(this).attr('class') != 'active'){
        $('.nav li ul').slideUp();
        $(this).next().slideToggle();
        $('.nav li a').removeClass('active');
        $(this).addClass('active');
      }
    });
  });