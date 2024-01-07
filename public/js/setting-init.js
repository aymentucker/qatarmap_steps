(function () {
    ("use strict");

    // Customizer Setting initialize
    let setting_options = document.querySelector('meta[name="setting_options"]');
    if (setting_options !== null && setting_options !== undefined) {
        setting_options = document.querySelector('meta[name="setting_options"]').getAttribute('content');
    } else {
        setting_options = JSON.parse("{}");
    }

    const theme = IQUtils.getQueryString('theme')
    if(theme !== '' && theme !== null) {
        setting_options = selectTheme(theme)
    }

    const setting = (window.IQSetting = new IQSetting(setting_options));

    const layout = IQUtils.getQueryString('layout')
    if(layout !== '' && layout !== null) {
        switch(layout) {
            case 'dark':
                setting.theme_scheme('dark')
                break;
            case 'semi-dark':
                setting.theme_scheme('light')
                setting.sidebar_color('sidebar-dark')
                break;
            case 'theme-blue':
                setting.setSettingColorChoice('theme_color', {
                    key: '--{{prefix}}primary',
                    value: '#2185F4',
                  })
                setting.theme_color('theme-color-blue')
                break;
            case 'theme-red':
                setting.setSettingColorChoice('theme_color', {
                    key: '--{{prefix}}primary',
                    value: '#FF3003',
                  })
                setting.theme_color('theme-color-red')
                break;
            case 'sidebar-oneside':
                setting.sidebar_menu_style('sidebar-default navs-rounded')
                break;
            case 'soft-menu':
                setting.sidebar_type(['sidebar-soft'])
                break;
            case 'sidebar-mini-hover':
                setting.sidebar_type(['sidebar-mini', 'sidebar-hover'])
                break;
            case 'rtl':
                setting.theme_scheme_direction('rtl')
                break;
            case 'dark-rtl':
                setting.theme_scheme('dark')
                setting.theme_scheme_direction('rtl')
                break;
            default:
                break
        }
    }

    // Sidebar type event listener
    $(document).on("sidebar_type", function (e) {
        if (typeof setting !== typeof undefined) {
        const sidebarType = setting.options.setting.sidebar_type.value;
        if(e.detail.value.length !== 0) {
            if(e.detail.currentValue !== 'sidebar-mini' && e.detail.currentValue !== '') {
            if (sidebarType.includes("sidebar-hover") && !e.detail.value.includes("sidebar-mini")) {
                const newTypes = sidebarType;
                newTypes.push("sidebar-mini");
                setting.sidebar_type(newTypes);
            }
            }
        }
        }
    });

    // navbar style event listener
    $(document).on("header_navbar", function () {
        if (typeof setting !== typeof undefined) {
        const headerNavbar = setting.options.setting.header_navbar;
        if (headerNavbar.value == "nav-glass") {
            $(headerNavbar.target).addClass("navs-sticky");
        }
        }
    });

    document.addEventListener('click', function(e) {
        const liveCustomizerPannel = document.querySelector('#live-customizer')
        if(liveCustomizerPannel !== null) {
        if(liveCustomizerPannel.classList.contains('show')) {
            if(e.target.closest('.live-customizer') == null && e.target.closest('#settingbutton') == null && e.target.closest('.btn-check') == null) {
                bootstrap.Offcanvas.getInstance(liveCustomizerPannel).hide()
            }
        }
        }
    })

    const liveCusomizer = IQUtils.getQueryString('live-customizer')
    if(liveCusomizer !== '' && liveCusomizer !== null && liveCusomizer === 'open') {
        const liveCustomizerPannel = document.querySelector('#live-customizer')
        const liveCustomizerInstance = new bootstrap.Offcanvas(liveCustomizerPannel)
        if(liveCustomizerInstance !== null) {
            liveCustomizerInstance.show()
        }
    }



    /*---------------------------------------------------------------------
                Reset Settings
    -----------------------------------------------------------------------*/
    const resetSettings = document.querySelector('[data-reset="settings"]');
    if(resetSettings !== null){
        resetSettings.addEventListener('click', (e) => {
            e.preventDefault();
            const confirm = window.confirm('Are you sure you want to reset your settings?');
            if (confirm) {
                window.IQSetting.reInit()
            }
        })
    }

    function selectTheme(theme) {
        switch (theme) {
            case '0':
            break;
        }
    }

})(jQuery);
