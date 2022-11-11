
$(function(){
    window.setTimeout(function () {
        slider_ul_list("top-menu-ul");
    }, 0);
    window.setTimeout(function () {
        slider_ul_list("top-menu-ul-1");
    }, 0);

    
    let $window = $(window);
    // let winW = $window.width();
    
    function slider_ul_list(id) {
        let obj = $('#' + id);
        let menu_box = obj.find('.item_menu_Box').width();
        //找最大父層
        let menu_box_parent = obj.parents('.video-flex.layout5').width()
				//算ul的的寬度
        let total_width = obj.find('ul').width();
        let menu_li = obj.find('li');
        let active = obj.find('.active').index();
        let active_offset = obj.find('li.active').offset().left;
        //若不是填滿container的狀態要把多的空間加回來 
        let move;
        //top-menu-ul的父層-item_menu_Box 可以得出要多加的空間是多少
        if(id === "top-menu-ul"){
            move = ((winW - menu_box_parent) + 426) / 2 ; 
        }else if(id === "top-menu-ul-1"){
            move = ((winW - menu_box_parent) + 681) / 2 ; 
        }
        let sum = 0, i = 0, sclEnd;
        let pos = new Array();
        let sumArray = new Array();


        menu_li.each(function () {
						//pos[i]計算每一個li到window的左邊距離
            pos[i] = $(this).offset().left;
						//sum是每個li在ul的起始位置
            sum = pos[i] - move;
						//total_width是全部li加起來的長度，menu_box是顯示出來的那段的長度，所以兩個相加為尚未顯示li的長度
            if (sum < total_width - menu_box) sclEnd = i;
            sumArray[i] = sum;
            
            i++;
        });

        //判斷是否有箭頭 
        $window.on('resize', function () {
            winW = $window.width();
            total_width = obj.find('ul').width();
            menu_box = obj.find('.item_menu_Box').width();
            if (total_width > menu_box) {
                obj.addClass('open_flexslider');
                obj.find('.item_menu_Box').scrollLeft(sumArray[active]);
            } else {
                obj.removeClass('open_flexslider');
            }
        }).resize();

        
        let isclick = true;
        $('#' + id + ' .rbtn').on('click', function () {
            if(isclick){
                isclick = false;
                if (sumArray[active] < total_width - menu_box) {
                    active++;
                    obj.find('.item_menu_Box').stop().animate({ scrollLeft: sumArray[active] }, 600)
                }
                setTimeout(function(){isclick = true}, 750)
            }
        })
        $('#' + id + ' .lbtn').on('click', function () {
            if(isclick){
                isclick = false;
                if (sumArray[active] > 0) {
                    active--;
                    obj.find('.item_menu_Box').stop().animate({ scrollLeft: sumArray[active] }, 600)
                }
                setTimeout(function(){isclick = true}, 750)
            }
        })
        //判斷是否第一個或是最後一個            
        $('#' + id + ' .item_menu_Box').on('scroll', function () {
            let newscroll = obj.find('.item_menu_Box').scrollLeft();
            if (newscroll <= 0) {
                obj.addClass('mleft');
                obj.find('.lbtn').addClass('nopage');
                obj.find('.rbtn').removeClass('nopage');
            } else if (newscroll > sumArray[sclEnd]) {
                obj.addClass('mright');
                obj.find('.rbtn').addClass('nopage');
                obj.find('.lbtn').removeClass('nopage');
            } else {
                obj.removeClass('mleft mright');
                obj.find('.arrow').removeClass('nopage');
            }
        }).scroll();
    }
})