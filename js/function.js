jQuery(function ($) {

    function match(element, className) {
        return element[clas].contains(className);
    }

    const $page = $('html, body'),
          clas = 'classList';

    

    // let $filter = $('.ins-s');
    // $filter.on('change', function (e) {
    //     e.preventDefault();
    //     let query = $(this).serialize();
    //     console.log(location.hostname);
    //     $.ajax({
    //         url: location.hostname+'/?'+query,
    //         type: 'GET',
    //         success: function (data) {
    //            // let $new_content = $(data).find('#ajaxContentTest');
    //            console.log(data);
    //            // $('#ajaxContentTest').html($new_content);
    //         }
    //     })
    // })

    // document.addEventListener('change', function(e) {
    //     let target = e.target;

    //     while (target != this) {

    //         if(match(target, 's-category') || match(target, 's-tag')) {
    //             searchPosts();
    //             current_page = 1;
    //             return;
    //         }
    //         target = target.parentNode;
    //     }
    // });
    //search insights
    // $('#search_topic, #search_category').on('change', function () {
    //     searchPosts();
    //     current_page = 1;
    // });
    // $('#insights-search').on('submit', function (e) {
    //     e.preventDefault();
    //     searchPosts();
    //     current_page = 1;

    // });

    // function searchPosts() {
    //     let data = {
    //         'action': 'ajaxSearch',
    //         'cat': $('#search_category').val(),
    //         'tag_id': $('#search_topic').val(),
    //         's': $('#search-field').val()
    //     };
    //     ajaxRequest(data);
    // }
    // //people search
    // $('#practice, #sector, #location').on('change',function () {
    //     searchPeople();
    // });
    // $('#people-search').on('submit', function (e) {
    //     e.preventDefault();
    //     searchPeople();
    // });
    // function searchPeople() {
    //     let data = {
    //         action: 'getLawyers',
    //         practice: $('#practice').val(),
    //         location: $('#location').val(),
    //         sector: $('#sector').val(),
    //         s: $('#people-query').val()
    //     };
    //     ajaxRequest(data);
    // }

    // function ajaxRequest(data) {
    //     $.ajax({
    //         url: ajax.url,
    //         data: data,
    //         type: 'POST',
    //         success: function (res) {
    //             $('#ajaxContent').empty().append(res);
    //         },
    //         error: function () {
    //             console.log('Ajax error!');
    //         }
    //     });
    //     $page.animate({
    //         scrollTop: $('.res-sect').offset().top
    //     }, 600);
    // }
    // //loadmore
    // $('#ajaxContent').click(function (e) {
    //     let $more = e.target.closest('.achivs__more');
    //     let $clear = e.target.closest('.search-criteria__clear');
    //     let $del = e.target.closest('.search-criteria__item');
    //     if ($more) {
    //         let data = {
    //             'action': 'loadmore',
    //             'query': true_posts,
    //             'page': current_page
    //         };
    //         $.ajax({
    //             url: ajax.url,
    //             data: data,
    //             type: 'POST',
    //             success: function (data) {
    //                 if (data) {
    //                     $('.search-ins').append(data);
    //                     current_page++;
    //                     if (current_page == max_pages) $more.remove();
    //                 } else {
    //                     $more.remove();
    //                 }
    //             }
    //         });
    //     } else if ($clear){
    //         $('#search-field, #people-query').val('');
    //         $('.search-criteria__item').each(function () {
    //             $(this).remove();
    //         });
    //         $('.search-bar__select').prop('selectedIndex', 0).trigger('change');
    //     } else if ($del){
    //         if($del.attributes['data-type'].nodeValue === 'cat'){
    //             $('#search_category').prop('selectedIndex', 0).trigger('change');
    //         } else if($del.attributes['data-type'].nodeValue === 'tag') {
    //             $('#search_topic').prop('selectedIndex', 0).trigger('change');
    //         } else if($del.attributes['data-type'].nodeValue === 'practice') {
    //             $('#practice').prop('selectedIndex', 0).trigger('change');
    //         } else if($del.attributes['data-type'].nodeValue === 'location') {
    //             $('#location').prop('selectedIndex', 0).trigger('change');
    //         } else if($del.attributes['data-type'].nodeValue === 'sector') {
    //             $('#sector').prop('selectedIndex', 0).trigger('change');
    //         } else if($del.attributes['data-type'].nodeValue === 's') {
    //             $('#search-field, #people-query').val('').trigger('submit');
    //         }
    //         $del.remove();
    //     }
    // });
    //formSubmit
    // $('#ajaxForm').on('submit',function (e) {
    //     e.preventDefault();
    //     let name = $('#modalName').val();
    //     let email = $('#modalEmail').val();
    //     let type = [];
    //     $('.modal-sub__radio-input:checked').each(function () {
    //         type.push($(this).val());
    //     });
    //     let data = {
    //         action: 'modalForm',
    //         name: name,
    //         email: email,
    //         type: type
    //     };
    //     submitForm(data);
    // });

    // $('#pdfForm').on('submit',function (e) {
    //     e.preventDefault();
    //     let name = $('#namePdf').val();
    //     let email = $('#EmailPdf').val();
    //     let data = {
    //         action: 'modalForm',
    //         name: name,
    //         email: email,
    //         file: $(this).data('pdf')
    //     };
    //     console.log(data);
    //     submitForm(data);
    // });

    // $('#contactForm').on('submit',function (e) {
    //     e.preventDefault();
    //     let name = $('#Name').val();
    //     let email = $('#Email').val();
    //     let message = $('#Message').val();
    //     let data = {
    //         action: 'modalForm',
    //         name: name,
    //         email: email,
    //         message: message
    //     };
    //     submitForm(data);
    // });

    // function submitForm(data) {
    //     $.ajax({
    //         url: ajax.url,
    //         data: data,
    //         type: 'POST',
    //         success: function (resp) {
    //             console.log(resp);
    //             if (data.file) {
    //                 get_file_url(resp);
    //             }
    //         },
    //         error: function (resp) {
    //             console.log(resp);
    //         }
    //     });

    // }

    // function get_file_url(url) {
    //     let link_url = document.createElement("a");
    //     link_url.download = url.substring((url.lastIndexOf("/") + 1), url.length);
    //     link_url.href = url;
    //     document.body.appendChild(link_url);
    //     link_url.click();
    //     document.body.removeChild(link_url);
    //     delete link_url;

    // }
});


