(function(window) {
  document.addEventListener('DOMContentLoaded', function (){
    const tour = new Shepherd.Tour({
      defaultStepOptions: {
        cancelIcon: {
          enabled: true
        },
        classes: 'class-1 class-2',
        scrollTo: { behavior: 'smooth', block: 'center' },
        when: {
          cancel: function () {
            IQUtils.saveSessionStorage('tour', 'true');
          }
        }
      },
    });

    tour.addSteps(
        [
      {
        title : `<h4>القائمة</h4>`,
        text: `<p class="mb-0">تحقق من المحتوى ضمن نمط القائمة. انقر لعرض جميع خيارات نمط القائمة المتاحة لك. </p>`,
          attachTo: {
            element: '#first-tour',
            on: 'right'
          },
          buttons: [
            {
              action() {
                return this.next();
              },
              text: 'التالي'
            },
          ],
          id: 'first-tour'
      },
      {
        title : `<h4>لوحة التحكم  </h4>`,
        text: `<p class="mb-0">قم بالاطلاع علي احصائيات سريعة عن شركتك و العقارات و الموظفين </p>`,
          attachTo: {
            element: '#itemdropdown1',
            on: 'bottom'
          },
          buttons: [
            {
              action() {
                return this.back();
              },
              classes: 'shepherd-button-secondary',
              text: 'السابق'
            },
            {
              action() {
                return this.next();
              },
              text: 'التالي'
            }
          ],
          id: 'dropdown1'
      },
      {
        title : `<h4>أداة التخصيص المباشرة </h4>`,
        text: `<p class="mb-0">قم بتحويل الشكل واللون والنمط والمظهر بالكامل باستخدام إعدادات أداة التخصيص المباشرة
        . قم بتغيير ونسخ الإعدادات من هنا </p>`,
          attachTo: {
            element: '#settingbutton',
            on: 'right'
          },
          buttons: [
            {
              action() {
                return this.back();
              },
              classes: 'shepherd-button-secondary',
              text: 'السابق'
            },
            {
              action() {
                IQUtils.saveSessionStorage('tour', 'true');
                return this.next();
              },
              text: 'تم'
            }
          ],
          id: 'title'
      },
    ]
    )
    // check media screen
    if (window.matchMedia('(min-width: 1198px)').matches) {
      setTimeout(() => {
        const liveCusomizer = IQUtils.getQueryString('live-customizer')
        if(liveCusomizer != 'open') {
          if(IQUtils.getSessionStorage('tour') !== 'true') {
            tour.start();
            $('.shepherd-modal-overlay-container').addClass('shepherd-modal-is-visible')
          }
        }
      }, 400)
    }
  })
})(window)
