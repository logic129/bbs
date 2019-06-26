var learnphp = function() {
    // 初始化变量
    var $mask = $('#mask'),
        $searchOner = $('#search-oner'),
        $searchOffer = $('#search-offer'),
        $mainnavOner = $('#mainnav-oner'),
        $mainnavOffer = $('#mainnav-offer');

    // 开启遮罩
    var maskOnHandler = function() {
        $mask.addClass('mask-on');
    };

    // 关闭遮罩
    var maskOffHandler = function() {
        $mask.removeClass('mask-on');
    };

    // 显示搜索
    var searchOnHandler = function($search) {
        maskOnHandler();
        $search.addClass('search-on');
    };

    // 隐藏搜索
    var searchOffHandler = function($search) {
        $search.removeClass('search-on');
        maskOffHandler();
    };

    // 显示导航
    var mainnavOnHandler = function($mainnav) {
        maskOnHandler();
        $mainnav.addClass('mainnav-on');
    };

    // 隐藏导航
    var mainnavOffHandler = function($mainnav) {
        $mainnav.removeClass('mainnav-on');
        maskOffHandler();
    };

    // 初始化，绑定事件
    var init = function() {
        $mainnavOner.on('click', function() {
            mainnavOnHandler($($(this).data('target')));
        });

        $mainnavOffer.on('click', function() {
            mainnavOffHandler($($(this).data('target')));
        });

        $searchOner.on('click', function() {
            searchOnHandler($($(this).data('target')));
        });

        $searchOffer.on('click', function() {
            searchOffHandler($($(this).data('target')));
        });

        $mask.on('click', function() {
            $mainnavOffer.trigger('click');
            $searchOffer.trigger('click');
        });
    };

    // 暴露接口
    return {init: init};
};

$(function() {
    learnphp().init();
});

