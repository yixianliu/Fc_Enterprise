// 统一加载
function funs() {
    // 下栏菜单鼠标移动展开隐藏
    $(".dropdown").mouseover(function () {
        $(this).addClass("open");
    });

    $(".dropdown").mouseleave(function () {
        $(this).removeClass("open");
    });
    // #下栏菜单鼠标移动展开隐藏

    // 获取幻灯片指标数量
    var caInd = $('.carousel-indicators li').length;
    // 获取幻灯片图片数量
    var caItem = $('.carousel-inner .item').length;

    // 判断幻灯片指标数量不等于1的情况展示和隐藏幻灯片指标
    if(caInd != 1){
        $('.carousel-indicators li').eq(0).addClass('active');
    } else {
        $('.carousel-indicators li').remove();
    }

    // 判断幻灯片图片数量不等于1的情况展示和隐藏左右箭头
    if(caItem != 1){
        $('.carousel-inner .item').eq(0).addClass('active');
    } else {
        $('.carousel-inner .item').eq(0).addClass('active');
        $('a.carousel-control').remove();
    }
}

// 首页上下图片滚动
function shows(){
    var index=0,len=$('.tabnav li').length,_timer=null;

    function showTab(index){
        $('.tabnav li').eq(index).addClass('cur').siblings().removeClass('cur');
        $('.tabcon li').eq(index).stop(true,true).slideDown('slow').siblings().slideUp('slow');
    }

    // 自动播放
    // function auto(){
    //     timer=setTimeout(function(){
    //         index=(index+1)%len;
    //         showTab(index);
    //         timer=setTimeout(arguments.callee,3500);
    //     },1000)
    // }
    //
    // auto();

    $('.tabnav li').mouseenter(function(){
        var index = $(this).index();
        showTab(index);
    });

    $('.acttabbox').hover(function(){
        clearTimeout(timer);
    },function(){
        // auto();
        return true;
    });
}

// 商城分类插件
function slides(){
    $("#nav .tit").slide({
        type:"menu",
        titCell:".mod_cate",
        targetCell:".mod_subcate",
        delayTime:0,
        triggerTime:10,
        defaultPlay:false,
        returnDefault:true
    });
}

function navHover() {
    $('#nav').hover(
        function (){
            $('#nav').find('ul.tit').css('display','block');
        },
        function(){
            $('#nav').find('ul.tit').css('display','none');
        }
    );
}

// 文字上下滚动
function myScrolls() {
    $('.myscroll').myScroll({
        speed: 40,          // 数值越大，速度越慢
        rowHeight: 30       // li的高度
    });
}

// 返回头部和导航菜单固定头部
function goTop() {
    // 滚动到知道高度 头部显示导航菜单 和 显示返回头部
    $(window).scroll(function(){
        if($(this).scrollTop() > 150){
            $('.navbar-default').addClass('navbar-fixed-top');
            $('.go-top').addClass('show');
        } else {
            $('.navbar-default').removeClass('navbar-fixed-top');
            $('.go-top').removeClass('show');
        }
    });

    // 点击返回头部
    $('.go-top').bind('click', function() {
        $("html, body").animate({ scrollTop: 0 }, 1000 );
        return false;
    });
};