(function (doc) {
    // import SimpleBar from '../../node_modules/simplebar/dist/simplebar.esm.js';
    function getElem(name, wrap) {
      if (wrap) {
        return wrap.querySelector(name);
      } else {
        return doc.querySelector(name);
      }
    }

    function getElems(name, wrap) {
      if (wrap) {
        return wrap.querySelectorAll(name);
      } else {
        return doc.querySelectorAll(name);
      }
    }

    function atr(elem, attrubute) {
      return elem.getAttribute(attrubute);
    }

    function match(element, className) {
      return element[clas].contains(className);
    }

    function collectSelectors(selector) {
      [].forEach.call(selector, function (el) {
        for (let i = 0; i < el.children[lengthArr]; i++) {
          if (el[child][i][tagName] == 'H2' || el[child][i][tagName] == 'H3') {
            arrayContents.push(el[child][i]);
          }
        }
      });
    }

    function numContentList() {
      const space = '&nbsp;',
        spanStart = '<span>',
        spanEnd = '</span>';

      if (contentListElem && contentListElem[lengthArr] != 0) {
        for (var i = 0; i < contentListElem[lengthArr]; i++) {
          let span = (i >= 10) ? `${spanStart}${i}${space}${space}—${space}${space}${spanEnd}` : `${spanStart}0${i}${space}${space}—${space}${space}${spanEnd}`;
          contentListElem[i][textContent] = (i >= 10) ? i : `0${i}`;
          // console.log(contentBlockText);
          arrayContents[i].insertAdjacentHTML('afterbegin', span);
        }
      }
      if (contentBlockTextNumList && contentBlockTextNumList[lengthArr] != 0) {
        for (let i = 0; i < contentBlockTextNumList[lengthArr]; i++) {
          let listItem = getElems('ol li', contentBlockTextNumList[i]);
          if (listItem[lengthArr] != 0) {
            for (let b = 0; b < listItem[lengthArr]; b++) {


              let num = b,
                spanList = (b >= 10) ? `${spanStart}${++num}.${spanEnd}` : `${spanStart}0${++num}.${spanEnd}`;
              listItem[b].insertAdjacentHTML('afterbegin', spanList);
              // return
            }
          } else {
            console.log('false', contentBlockTextNumList[i]);
            continue;
          }
        }
      }
    }

    // возвращает куки с указанным name,
    // или undefined, если ничего не найдено
    function getCookie(name) {
      let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
      ));
      return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    function setCookie(name, value, options = {}) {

      options = {
        path: '/',
        // при необходимости добавьте другие значения по умолчанию
        ...options
      };

      if (options.expires instanceof Date) {
        options.expires = options.expires.toUTCString();
      }

      let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

      for (let optionKey in options) {
        updatedCookie += "; " + optionKey;
        let optionValue = options[optionKey];
        if (optionValue !== true) {
          updatedCookie += "=" + optionValue;
        }
      }

      document.cookie = updatedCookie;
    }

    function checkCookie(name) {
      let checkCook = getCookie(name);

      if (checkCook && cooliesPolicy) {
        cooliesPolicy[clas].add('hide');
        return;
      } else {
        return;
      }
    }

    function validName(el) {
      var shab = /[&\/\\#,+()$~%.'":*?!<>{}0-9]/g;
      var value = el.value;
      if (shab.test(value)) {
        value = value.replace(shab, '');
        el.value = value;
      }
    }

    function validMessage(el) {
      var shab = /[\/\\#+()$~%'":*<>{}]/g;
      var value = el.value;
      if (shab.test(value)) {
        value = value.replace(shab, '');
        el.value = value;
      }
    }

    function validEmail(email) {
      var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
      return re.test(email);
    }

    function trigerChanger(nameElem, selectIndex, trigerEvent) {
      $(nameElem).prop('selectedIndex', selectIndex).trigger(trigerEvent);
    }

    function checkValidName(el) {
      let elValue = +el.value,
        elWrap = el[parentEl];
      if (isNaN(elValue)) {
        return true;
      } else {
        elWrap[clas].add('error');
        return false;
      }
    }

    function checkValidEmail(el) {
      let elValue = el.value,
        elWrap = el[parentEl];
      if (validEmail(elValue)) {
        return true;
      } else {
        elWrap[clas].add('error');
        return false;
      }
    }

    function validationAllFields(elems, formType) {
      let data = {
          action: 'modalForm',
          name: null,
          email: null
        },
        subscribeTypes = [];

      for (let i = 0; i < elems[lengthArr]; i++) {
        if (match(elems[i], 'inp-name')) {
          if (!checkValidName(elems[i])) {
            SubscribeBtn[clas].remove('load');
            return false;
          }
          data.name = elems[i].value;
          if (formType == 'pdf' && data.file == undefined) {
            data.file = true;
            data.post_id = postIdForPdf;
          }
        }
        if (match(elems[i], 'inp-email')) {
          if (!checkValidEmail(elems[i])) {
            SubscribeBtn[clas].remove('load');
            return false;
          }
          data.email = elems[i].value;
        }
        if (match(elems[i], 'ch-sub')) {
          if (elems[i][Ischecked] && formType == 'sub') {
            subscribeTypes.push(elems[i].value);
          }
        }
        if (match(elems[i], 'mes-tar')) {
          data.message = elems[i].value;
        }
        if (match(elems[i], 'utm')) {
          if (match(elems[i], 'utm_sors')) {
            data.utm_source = elems[i].value;
          } else if (match(elems[i], 'utm_cont')) {
            data.utm_content = elems[i].value;
          } else if (match(elems[i], 'utm_med')) {
            data.utm_medium = elems[i].value;
          } else if (match(elems[i], 'utm_cam')) {
            data.utm_campaign = elems[i].value;
          } else if (match(elems[i], 'utm_term')) {
            data.utm_term = elems[i].value;
          }
        }
      }

      if (subscribeTypes[lengthArr] <= 0 && formType == 'sub') {
        return false;
      } else if (formType == 'sub') {
        data.type = subscribeTypes;
      }
      return data;
    }

    function get_file_url(url) {
      if (url) {
        let link_url = document.createElement("a");
        link_url.download = url.substring((url.lastIndexOf("/") + 1), url[lengthArr]);
        link_url[hrefLink] = url;
        document.body.appendChild(link_url);
        link_url.click();
        document.body.removeChild(link_url);
        // delete link_url;
      } else {
        return false;
      }
    }

    function removeWidthHeightAtr(els) {
      [].forEach.call(els, function (el) {
        // if(el.width) {}
        if (atr(el, 'width') && atr(el, 'height')) {
          el.removeAttribute('width');
          el.removeAttribute('height');
        }
      });
    }

    const fildSelector = $('.nav-search'),
      logoWrap = $('.logo'),
      menuHead = $('.menu__wrapper'),
      tabContentWrapEx = getElems('.cont-tab'),
      tabContentWrapExModal = getElems('.cont-tab-2'),
      tabContentWrapIns = getElems('.cont-tab-ins'),
      tabTitlePlaces = getElems('.map-titl'),
      tabContentMapPlace = getElems('.map-cont'),
      modMenu = getElem('.mod-menu'),
      btnMenuOpener = getElem('.btn-menu'),
      tabBtnJobs = getElems('.job-tab'),
      tabJobsItem = getElems('.job-cont'),
      modalWindow = getElem('.modals'),
      modalJobs = getElem('.job-modal'),
      jobContentModal = getElems('.j-all-cont'),
      clas = 'classList',
      child = 'children',
      tagName = 'tagName',
      textContent = 'textContent',
      lengthArr = 'length',
      Ischecked = 'checked',
      hrefLink = 'href',
      parentEl = 'parentNode',
      openerContent = getElem('.op-cont'),
      scrollCont = getElems('.scroll-cont'),
      cardsScroll = getElem('.sc-ofrs'),
      menusItem = getElem('.menu > ul > li > a'),
      menusItem2 = getElem('.mod-menu__wrap > ul > li > a'),
      articleSlide = getElems('.atl-slide'),
      contentListElem = getElems('.cl-num'),
      contentBlockText = getElems('.bl-num'),
      contentBlockTextNumList = getElems('.bl-num ol'),
      cooliesPolicy = getElem('.cok-b'),
      contactDropDown = getElem('.c-drop-down'),
      insightsTabTite = getElems('.ins-tab'),
      viewAllConstLink = (getElem('.ins-view')) ? getElem('.ins-view')[hrefLink] : null,
      $page = $('html, body'),
      ajaxForm = getElem('.ajaxForm'),
      checkboxSubscribe = getElems('.ch-sub'),
      checkboxAllSubscribe = getElem('.ch-sub-0'),
      SubscribeBtn = getElem('.sub-btn'),
      pdfBtn = getElem('.pdf-sub'),
      touchBtn = getElem('.touch-btn'),
      $search_form = $('.header-search'),
      allTagImg = getElems('img'),
      avchivusSect = getElem('.achivs-sect'),
      archivusInsights = getElems('.insights__card', avchivusSect),
      archivusMoreBtn = getElem('.ach-m');

    // if(avchivusSect && archivusInsights[lengthArr] < 3) {
    //     archivusMoreBtn.style.display = 'none';
    // }

    // let lol = getElems('ol li', contentBlockTextNumList[2]);
    // console.log(contentListElem[lengthArr]);
    var filterJobIndex,
      filterJobItemIndex,
      jobBtnCntentIndex,
      jobContentIndex,
      insideJobItemIndx,
      titleCityIndex,
      contentCityIndex,
      postIdForPdf,
      arrayContents = [];

    // console.log(getCookie('policy'));
    checkCookie('policy');
    collectSelectors(contentBlockText);
    numContentList();
    removeWidthHeightAtr(allTagImg);
    // console.log(contentBlockText);
    doc.addEventListener('click', function (e) {
      let target = e.target;

      while (target != this) {

        // console.log(target);
        if (match(target, 'btn-menu')) {
          target[clas].add('active');
          modMenu[clas].add('active');
        }
        if (match(target, 'btn-menu-close')) {
          btnMenuOpener[clas].remove('active');
          modMenu[clas].remove('active');
        }
        if (match(target, 'job-tab')) {
          filterJobIndex = atr(target, 'data-city');
          for (let i = 0; i < tabBtnJobs[lengthArr]; i++) {
            tabBtnJobs[i][clas].remove('active');
          }
          target[clas].add('active');

          [].forEach.call(tabJobsItem, function (a, b) {
            if (filterJobIndex == 'all') {
              a[clas].remove('hide');
              a[clas].add('active');
              return;
            }
            filterJobItemIndex = atr(a, 'data-city')
            if (filterJobItemIndex == filterJobIndex) {
              if (match(a, 'hide')) {
                a[clas].remove('hide')
              }
              a[clas].add('active');
            } else {

              a[clas].add('hide');
            }
          });
          return;
        }
        if (target == menusItem || target == menusItem2 || match(target, 'exp') || match(target, 'subs') || match(target, 'dow-info')) {
          e.preventDefault();
          if (target == menusItem || target == menusItem2 || match(target, 'exp')) {
            if (match(modMenu, 'active')) {
              modMenu[clas].remove('active');
            }
            modalWindow[clas].add('active-static');
            doc.body.style.overflow = 'hidden';
            return;
          }
          if (match(target, 'subs')) {
            modalWindow[clas].add('active-sub');
            doc.body.style.overflow = 'hidden';
            return;
          }
          if (match(target, 'dow-info')) {
            postIdForPdf = atr(target, 'data-id');
            modalWindow[clas].add('active-dow');
            doc.body.style.overflow = 'hidden';
            return;
          }
          doc.body.style.overflow = 'hidden';
        }
        if (match(target, 'mod-close')) {
          // console.log(modalWindow);
          if (modalWindow != null) {
            if (match(modalWindow, 'active') || match(modalWindow, 'active-static') || match(modalWindow, 'active-sub') || match(modalWindow, 'active-dow')) {
              modalWindow[clas].remove('active-dow');
              modalWindow[clas].remove('active-sub');
              modalWindow[clas].remove('active-static');
              modalWindow[clas].remove('active');
              doc.body.style.overflow = 'visible';
              // return;
            }
          }
          doc.body.style.overflow = 'visible';
          if(modalJobs) {
            if (match(modalJobs, 'active')) {
              modalJobs[clas].remove('active');
              doc.body.style.overflow = 'visible';
              // return;
            }
          }

          doc.body.style.overflow = 'visible';
          return;
        }
        if (match(target, 'j-open')) {
          jobBtnCntentIndex = atr(target, 'data-id');

          modalJobs[clas].add('active');

          doc.body.style.overflow = 'visible';

          [].forEach.call(jobContentModal, function (el) {
            el[clas].remove('active-cont');
            jobContentIndex = atr(el, 'data-id');
            if (jobContentIndex == jobBtnCntentIndex) {
              el[clas].add('active-cont');
              return;
            }
          });
        }

        if (match(target, 'ch-cont')) {
          insideJobItemIndx = atr(target, 'data-id');
          [].forEach.call(jobContentModal, function (el) {
            el[clas].remove('active-cont');
            jobContentIndex = atr(el, 'data-id');
            if (jobContentIndex == insideJobItemIndx) {
              el[clas].add('active-cont');
              return;
            }
          });
        }
        if (match(target, 'cok')) {
          doc.cookie = 'policy=true';
          cooliesPolicy[clas].add('hide');
          return;
        }
        if (match(target, 'ach-m')) {
          if (target[clas].contains('active')) {
            if(openerContent) {
              openerContent[clas].remove('open');
            }
            target[clas].remove('active');
            return;
          }
          target[clas].add('active');
          openerContent[clas].add('open');
          return;
        }

        if (match(target, 'map-titl')) {
          titleCityIndex = atr(target, 'data-id');
          for (let i = 0; i < tabTitlePlaces[lengthArr]; i++) {
            tabTitlePlaces[i][clas].remove('active');
            if (target == tabTitlePlaces[i]) {
              tabTitlePlaces[i][clas].add('active');
            }
          }

          // contentCityIndex
          [].forEach.call(tabContentMapPlace, function (el) {
            el[clas].remove('active');
            contentCityIndex = atr(el, 'data-id');
            if (contentCityIndex == titleCityIndex) {
              el[clas].add('active');
            }
          });
        }
        if (match(target, 'opener-c')) {
          contactDropDown[clas].add('active');
        }
        if (match(target, 'op-btn')) {
          if (!match(contactDropDown, 'active')) {
            contactDropDown[clas].add('active');
            return;
          }
          contactDropDown[clas].remove('active');
        }
        if (match(target, 'js-lnk')) {
          for (let i = 0; i < target.children[lengthArr]; i++) {
            if (match(target.children[i], 'lnk-a')) {
              // console.log('lol 2')
              // let href = atr(target.children[i], 'href')
              window.location = target.children[i][hrefLink];
              return;
            }
          }
        }
        if (match(target, 'ins-view')) {
          for (let i = 0; i < insightsTabTite[lengthArr]; i++) {
            let elCategory = atr(insightsTabTite[i], 'data-category');

            if (elCategory && match(insightsTabTite[i], 'active')) {
              target[hrefLink] = `${viewAllConstLink}?c=${elCategory}`;
              return;
            } else {
              target[hrefLink] = `${viewAllConstLink}`;
              continue;
            }
          }
          ;
        }
        if (match(target, 'ch-sub')) {
          let allSub = match(target, 'ch-sub-0');
          if (allSub) {
            for (let i = 1; i < checkboxSubscribe[lengthArr]; i++) {
              checkboxSubscribe[i][Ischecked] = false;
            }
          } else {
            checkboxAllSubscribe[Ischecked] = false;
          }
        }
        if (match(target, 'sh-lnk')) {
          e.preventDefault();
          window.open(target[hrefLink], target.title, 'width=548,height=325,left=0,top=0,toolbar=0,status=0');
          return false;
        }
        target = target[parentEl];

      }
    });
    doc.addEventListener('keyup', function (e) {
      let target = e.target;

      while (target != this) {

        if (match(target, 'inp')) {
          let parrentNodeError = target[parentEl];

          if (match(parrentNodeError, 'wr-inp')) {
            if (match(parrentNodeError, 'error')) {
              parrentNodeError[clas].remove('error');
            }
          }
          if (match(target, 'inp-name')) {
            validName(target);
          }
        }
        if (match(target, 'mes-tar')) {
          validMessage(target);
        }

        target = target[parentEl];
      }
    });
    // if (inputName) inputName.addEventListener('keyup', validName);

    $(window).scroll(function () {

      if ($(this).scrollTop() > 50) {
        $('nav').addClass("op");
      } else {
        $('nav').removeClass("op");
      }
    });
    $(window).scroll(function () {
      if ($(this).scrollTop() > 500) {
        $('nav').addClass("sticky");
      } else {
        $('nav').removeClass("sticky");
      }
    });
    $('.achor-atc').click(function () {
      // console.log($($.attr(this, 'href')).offset().top - 25);
      $page.animate({
        scrollTop: $($.attr(this, 'href')).offset().top - 70
      }, 400);
      return false;
    });
    $('input[data-head-search]').focus(function () {
      // console.log('lol');
      fildSelector.addClass('nav-search_active');
      menuHead.addClass('hide');
      if (window.innerWidth < 768) {
        logoWrap.addClass('hide')
      }
    }).blur(function () {
      fildSelector.removeClass('nav-search_active');
      menuHead.removeClass('hide');
      if (window.innerWidth < 768) {
        logoWrap.removeClass('hide')
      }
    });
    $('.tg-sl').click(function (event) {
      $(this).toggleClass('open')
      $(this).children(".tg-sl-cont").slideToggle();
      event.stopPropagation();
    });
    $('.map-titl').click(function () {
      if (!$(this).is('active')) {
        $('.map-titl').removeClass('active');
        $(this).addClass('active');
      }
    });
    $(doc).on("click", ".ex-tab, .ins-tab, .ex-tab-2", function () {
      var index = atr(this, 'data-id'),
        tabWrap,
        tabTitle = (match(this, 'ex-tab')) ? '.ex-tab' : (match(this, 'ins-tab')) ? '.ins-tab' : (match(this, 'ex-tab-2')) ? '.ex-tab-2' : null,
        tabContClass = (match(this, 'ex-tab')) ? '.cont-tab' : (match(this, 'ins-tab')) ? '.cont-tab-ins' : (match(this, 'ex-tab-2')) ? '.cont-tab-2' : null;

      if (!$(this).is("active")) {
        $(tabTitle).removeClass("active");
        $(tabContClass).removeClass("active");

        $(this).addClass("active");
        tabWrap = (match(this, 'ex-tab')) ? tabContentWrapEx : (match(this, 'ins-tab')) ? tabContentWrapIns : (match(this, 'ex-tab-2')) ? tabContentWrapExModal : null;
        for (let i = 0; i < tabWrap[lengthArr]; i++) {
          let contentIndex = atr(tabWrap[i], 'data-id');

          if (contentIndex == index) {
            tabWrap[i][clas].add("active");
            return;
          }
        }
      }
    });

    $('.tog-slide').click(function (event) {
      $(this).toggleClass('open');
      $(this).children(".tog-cont").slideToggle();
      event.stopPropagation();
    });

    var awardSlider = new Swiper('.slider_awards', {
      slidesPerView: 4,
      spaceBetween: 105,
      scrollbar: {
        el: '.slider__scrollbar',
        dragSize: 103,
        draggable: true,
        hide: false,
      },
      breakpoints: {
        1050: {
          slidesPerView: 3,
        },
        760: {
          slidesPerView: 2,
          spaceBetween: 55,
        }
      }
    });
    var clientSlider = new Swiper('.slider_client', {
      slidesPerView: 4,
      spaceBetween: 105,
      scrollbar: {
        el: '.slider__scrollbar',
        dragSize: 103,
        draggable: true,
        hide: false,
      },
      breakpoints: {
        1050: {
          slidesPerView: 3,
        },
        760: {
          slidesPerView: 2,
          spaceBetween: 55,
        }
      }
    });
    var reviewsSlider = new Swiper('.slider_reviews', {
      spaceBetween: 700,
      pagination: {
        el: '.slider-pagin',
        clickable: true,
        renderBullet: function (index, className) {
          ++index;
          let idx = (index < 10) ? `0${index}` : index;
          return `<button class="bullet ${className}" >${idx}</button>`;
        }
      },
      navigation: {
        nextEl: '.btn-next',
        prevEl: '.btn-prev',
      },
      allowTouchMove: false,
      breakpoints: {
        1100: {
          allowTouchMove: true,
        }
      },
      // on: {
      //     click: function() {
      //         $('.review__slide .simplebar-vertical .simplebar-visible').trigger('mousedown');
      //     }
      // }
    });
    var articleSlider = new Swiper('.slider_article', {
      init: false,
      effect: 'fade',
      preloadImages: false,
      // Enable lazy loading
      lazy: true,
      pagination: {
        el: '.slider-pagin',
        clickable: true,
        renderBullet: function (index, className) {
          return `<button class="bullet ${className}" >0${(index + 1)}</button>`;
        }
      },
      navigation: {
        nextEl: '.btn-next',
        prevEl: '.btn-prev',
      },
    });

    if (articleSlide && articleSlide[lengthArr] > 1) {
      articleSlider.init();
    }
    if (scrollCont) {
      [].forEach.call(scrollCont, function (el) {
        new SimpleBar(el, {
          autoHide: false,
          forceVisible: 'x'
        });
      });
    }
    if (cardsScroll) {
      new SimpleBar(cardsScroll, {
        autoHide: false,
        forceVisible: true
      });
    }
    if (window.innerWidth < 500) {
      $('nav').addClass("nav-mob");
      const mobPlase = atr(getElem('input[data-head-search]'), 'data-mob-text');
      let inputHomeSearch = getElem('input[data-head-search]');
      inputHomeSearch.setAttribute('placeholder', mobPlase);
    }

    function searchPosts() {
      let data = {
        'action': 'ajaxSearch',
        'cat': $('.s-category').val(),
        'tag_id': $('.s-tag').val(),
        's': $('.s-field').val()
      };
      let options = {
        'cat': $('.s-category option:selected').text(),
        'tag_id': $('.s-tag option:selected').text(),
        's': $('.s-field').val(),
      };
      if (window.location.search) {
        let url = location.protocol + '//' + location.host + location.pathname;
        window.history.replaceState({}, document.title, url);
      }

      ajaxRequest(data, options);
    }

    function searchPeople() {
      let data = {
        'action': 'getLawyers',
        'practice': $('.s-practice').val(),
        'location': $('.s-location').val(),
        'sector': $('.s-sector').val(),
        's': $('.s-field-law').val()
      };

      let options = {
        'practice': $('.s-practice option:selected').text(),
        'location': $('.s-location option:selected').text(),
        'sector': $('.s-sector option:selected').text(),
        's': $('.s-field-law').val(),
      };
      if (window.location.search) {
        let url = location.protocol + '//' + location.host + location.pathname;
        window.history.replaceState({}, document.title, url);
        console.log(location.pathname);
      }
      ajaxRequest(data, options);
    }

    function ajaxRequest(data, options) {
      $.ajax({
        url: ajax.url,
        data: data,
        type: 'POST',
        success: function (res) {
          $('#ajaxContent').empty().append(res);
          let data_array = Object.values(data).splice(1);
          data_array = data_array.filter(Boolean);
          for (let i = 0; i < data_array.length; i++){
            if(data_array[i] !== "0"){
              $(".s-clr").css('display', 'block');
              break;
            }
          }
          for (let key in data) {
            if (data[key] && data[key] !== '0') {
              if (key !== 'action') {
                addFilterItem(options[key], key);
              }
            }
          }
          postsFound();
        },
        error: function () {
          console.log('Ajax error!');
        }
      });
      $page.animate({
        scrollTop: $('.res-sect').offset().top
      }, 600);
    }

    function addFilterItem(position, dataType) {
      let $filter_item = `<li class="search-criteria__item cr-itm" data-type="${dataType}">
                                <span class="search-criteria__label">${position}</span>
                                <button class="search-criteria__delite"></button>
                            </li>`;

      let $filter = $('.search-criteria__filters');

      if ($('.search-filter__empty').length > 0) {
        $('.search-filter__empty').remove();
      }

      $filter.append($filter_item);
    }

    function postsFound(){
      if(getCookie('found_posts')){
        $('.search-criteria__count').text(getCookie('found_posts'));
      }
    }


    // ===================== Search insights ================================
  $('.s-category, .s-tag').on('change', function () {
    searchPosts();
  });
  $('.ins-s').on('submit', function (e) {
    e.preventDefault();
    searchPosts();
  });

  $(document).ready(function () {
    if(getCookie('found_posts')){
      postsFound();
    }
  });

  $('.topics__item').on('click', function () {
    let data = $(this).data('id');
    $(".s-tag option[value = " + data + "]").attr('selected', true).trigger("change");

  });


  // ===================== Search insights ================================

  let local = ['/insights/', '/ru/insights/', '/de/insights/', '/ua/insights/'];
  let search = window.location.search;
  if (local.indexOf(location.pathname) !== -1 && search) {
    let params = (new URL(document.location)).searchParams;
    if(params.get('c')){
      $(".s-category option[value = " + params.get('c') + "]").attr('selected', true).trigger("change");
    } else if (params.get('t')){
      $(".s-tag option[value = " + params.get('t') + "]").attr('selected', true).trigger("change");
    }
  }

  // ===================== Search People ================================
  $('.s-practice, .s-sector, .s-location').on('change', function () {
    searchPeople();
  });
  $('.law-s').on('submit', function (e) {
    e.preventDefault();
    searchPeople();
  });

  let locations = ['/people/', '/ru/people/', '/de/people/', '/ua/people/'];
  if (locations.indexOf(location.pathname) !== -1 && window.location.search) {
    $('.law-s').submit();
  }


  // ===================== Search People ================================
  $('#ajaxContent').click(function (e) {
    let target = e.target,
      $more = target.closest('.ach-m'),
      $clear = target.closest('.s-clr'),
      $del = target.closest('.cr-itm');

    if ($more) {
      let data = {
        'action': 'loadmore',
      };
      $.ajax({
        url: ajax.url,
        data: data,
        type: 'POST',
        success: function (data) {
          if (data) {
            $('.search-ins').append(data);
            let current_page = parseInt(getCookie('current_page'));
            let max_page = parseInt(getCookie('max_pages'));
            setCookie('current_page', (current_page + 1));
            if (current_page === max_page) {
              $more.remove();
            }
          } else {
            $more.remove();
          }
        }
      });
    } else if ($clear) {
      $('.s-field, .s-field-law').val('');

      $('.cr-itm').each(function () {
        $(this).remove();
      });
      trigerChanger('.s-sel', 0, 'change');

    } else if ($del) {
      let delType = atr($del, 'data-type');
      if (delType === 'cat') {
        trigerChanger('.s-category', 0, 'change');
      } else if (delType === 'tag') {
        trigerChanger('.s-tag', 0, 'change');
      } else if (delType === 'practice') {
        trigerChanger(`.s-${delType}`, 0, 'change');
      } else if (delType === 'location') {
        trigerChanger(`.s-${delType}`, 0, 'change');
      } else if (delType === 'sector') {
        trigerChanger(`.s-${delType}`, 0, 'change');
      } else if (delType === 's') {
        $('.s-field, .s-field-law').val('').trigger('submit');
      }
      $del.remove();
    }
  });
  $('.ajaxForm').on('submit', function (e) {
    e.preventDefault();
    let elems = this.elements,
      validation,
      formType = atr(this, 'data-type');

    if (formType == 'sub') {
      SubscribeBtn[clas].add('load');

      validation = validationAllFields(elems, formType);

      if (validation) {
        submitForm(validation, formType, this);
      } else {
        SubscribeBtn[clas].remove('load');
      }
    } else if (formType == 'pdf') {
      pdfBtn[clas].add('load');

      validation = validationAllFields(elems, formType);

      if (validation) {
        submitForm(validation, formType, this);
      } else {
        pdfBtn[clas].remove('load');
      }
    } else if (formType == 'touch') {
      touchBtn[clas].add('load');

      validation = validationAllFields(elems, formType);

      if (validation) {
        submitForm(validation, formType, this);
      } else {
        touchBtn[clas].remove('load');
      }
    }

  });

  function submitForm(data, formType, form) {
    $.ajax({
      url: ajax.url,
      data: data,
      type: 'POST',
      success: function (resp) {
        if (formType == 'sub') {
          SubscribeBtn[clas].remove('load');

          SubscribeBtn[clas].add('sucsses');

          setTimeout(function () {
            SubscribeBtn[clas].remove('sucsses');
          }, 3000);
        } else if (formType == 'pdf') {
          pdfBtn[clas].remove('load');

          pdfBtn[clas].add('sucsses');

          if (data.file) {
            get_file_url(resp);
          }

          setTimeout(function () {
            pdfBtn[clas].remove('sucsses');
          }, 3000);
        } else if (formType == 'touch') {
          touchBtn[clas].remove('load');

          touchBtn[clas].add('sucsses');

          setTimeout(function () {
            touchBtn[clas].remove('sucsses');
          }, 3000);
        }
        form.reset();
      },
      error: function (resp) {
        console.warn(resp);
      }
    });

  }

  var myParam = location.search.split('tab=')[1];
  if (myParam) {
    setTimeout(function () {
      for(let itm of tabContentMapPlace) {
        itm[clas].remove('active')
      }
      $('.place-map li button').eq(myParam).trigger('click');
      tabContentMapPlace[myParam][clas].add('active');
    }, 1500);
  }

  // ===================== lang switcher ================================

  $('.nav-lang__item').on('click', function () {
    let lang = $(this).data('lang');
    let path_name = location.pathname.split('/').filter(Boolean);
    if(path_name.length >0){
      if(path_name[0].length < 3){
        path_name[0] = lang;
      } else {
        path_name.unshift(lang);
      }
    } else {
      path_name.push(lang);
    }
    path_name = '/' + path_name.join('/') + '/';
    window.open(path_name + location.search, "_self");
  })
})(document)