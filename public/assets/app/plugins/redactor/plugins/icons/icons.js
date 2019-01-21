(function($R)
{
    $R.add('plugin', 'icons', {
        translations: {
            en: {
                "icons": "Iconos",
                "icons-select": "Selecciona un icono"
            }
        },
        modals: {
            'icons': '',
        },
        init: function(app)
        {
            this.app = app;
            this.lang = app.lang;
            this.toolbar = app.toolbar;
            this.insertion = app.insertion;
        },

        // messages
        onmodal: {
            icons: {
                open: function($modal)
                {
                    this._build($modal);
                }
            }
        },

        start: function()
        {
            // create dropdown object
            var dropdownData = {
                item1: {
                    title: 'Abstracto',
                    api: 'plugin.icons.open'
                },
                item2: {
                    title: 'Animal',
                    api: 'plugin.icons.method2'
                },
                item29: {
                    title: 'Aplicación web',
                    api: 'plugin.icons.method1'
                },
                item22: {
                    title: 'Buscar',
                    api: 'plugin.icons.method1'
                },
                item28: {
                    title: 'Clima',
                    api: 'plugin.icons.method1'
                },
                item13: {
                    title: 'Comida',
                    api: 'plugin.icons.method1'
                },
                item6: {
                    title: 'Construcción',
                    api: 'plugin.icons.method1'
                },
                item24: {
                    title: 'Deportes',
                    api: 'plugin.icons.method1'
                },
                item9: {
                    title: 'Direccionales',
                    api: 'plugin.icons.method1'
                },
                item8: {
                    title: 'Dispositivos',
                    api: 'plugin.icons.method1'
                },
                item25: {
                    title: 'Editor de texto',
                    api: 'plugin.icons.method1'
                },
                item10: {
                    title: 'Educación',
                    api: 'plugin.icons.method1'
                },
                item11: {
                    title: 'Emoticon',
                    api: 'plugin.icons.method1'
                },
                item5: {
                    title: 'Gráficos',
                    api: 'plugin.icons.method1'
                },
                item14: {
                    title: 'Niños & Juguetes',
                    api: 'plugin.icons.method1'
                },
                item15: {
                    title: 'Ley',
                    api: 'plugin.icons.method1'
                },
                item3: {
                    title: 'Marca',
                    api: 'plugin.icons.method1'
                },
                item16: {
                    title: 'Matemáticas',
                    api: 'plugin.icons.method1'
                },
                item17: {
                    title: 'Medicina',
                    api: 'plugin.icons.method1'
                },
                item7: {
                    title: 'Monedas',
                    api: 'plugin.icons.method1'
                },
                item19: {
                    title: 'Multimedia',
                    api: 'plugin.icons.method1'
                },
                item4: {
                    title: 'Negocio',
                    api: 'plugin.icons.method1'
                },
                item20: {
                    title: 'Pago',
                    api: 'plugin.icons.method1'
                },
                item21: {
                    title: 'Persona',
                    api: 'plugin.icons.method1'
                },
                item23: {
                    title: 'Redes Sociales',
                    api: 'plugin.icons.method1'
                },
                item12: {
                    title: 'Tipos de archivo',
                    api: 'plugin.icons.method1'
                },
                item26: {
                    title: 'Transporte',
                    api: 'plugin.icons.method1'
                },
                item18: {
                    title: 'UI móvil',
                    api: 'plugin.icons.method1'
                },
                item27: {
                    title: 'Viajar',
                    api: 'plugin.icons.method1'
                }
            };

            // create the button data
            var buttonData = {
                title: this.lang.get('icons')
            };

            // create the button
            var $button = this.toolbar.addButton('icons', buttonData);
            $button.setDropdown(dropdownData);
        },
        open: function(type){
            var options = {
                title: this.lang.get('icons'),
                width: '700px',
                name: 'icons'
            };

            this.app.api('module.modal.build', options);
        },

        // private
        _build: function($modal)
        {
            var $body = $modal.getBody();
            var $label = this._buildLabel();
            var $list = this._buildList();

            this._buildItems($list);

            $body.html('');
            $body.append($label);
            $body.append($list);

        },
        _buildLabel: function()
        {
            var $label = $R.dom('<label>');
            $label.html(this.lang.parse('## icons-select ##:'));

            return $label;
        },
        _buildList: function()
        {
            var $list = $R.dom('<ul>');
            $list.addClass('redactor-icons-list');

            return $list;
        },
        _buildItems: function($list)
        {
            var items = this.icons;
            for (var i = 0; i < items.length; i++)
            {
                var $li = $R.dom('<li>');
                var $item = $R.dom('<span class="icofont '+items[i][0]+'">');

                $item.attr('data-index', i);
                $item.on('click', this._insert.bind(this));

                $li.append($item);
                $list.append($li);
            }
        },
        _insert: function(e)
        {
            var $item = $R.dom(e.target);
            var index = $item.attr('data-index');
            var html = this.icons[index][1];

            this.app.api('module.modal.close');
            this.insertion.insertRaw(html);
        },

        //ARRAY DE ICONOS
        icons: [
            ['icofont-angry-monster','<i class="icofont icofont-angry-monster"></i>'],
            ['icofont-bathtub','<i class="icofont icofont-bathtub"></i>'],
            ['icofont-bird-wings','<i class="icofont icofont-bird-wings"></i>'],
            ['icofont-bow','<i class="icofont icofont-bow"></i>'],
            ['icofont-brain-alt','<i class="icofont icofont-brain-alt"></i>'],
            ['icofont-butterfly-alt','<i class="icofont icofont-butterfly-alt"></i>'],
            ['icofont-castle','<i class="icofont icofont-castle"></i>'],
            ['icofont-circuit','<i class="icofont icofont-circuit"></i>'],
            ['icofont-dart','<i class="icofont icofont-dart"></i>'],
            ['icofont-dice-alt','<i class="icofont icofont-dice-alt"></i>'],
            ['icofont-disability-race','<i class="icofont icofont-disability-race"></i>'],
            ['icofont-diving-goggle','<i class="icofont icofont-diving-goggle"></i>'],
            ['icofont-fire-alt','<i class="icofont icofont-fire-alt"></i>'],
            ['icofont-flame-torch','<i class="icofont icofont-flame-torch"></i>'],
            ['icofont-flora-flower','<i class="icofont icofont-flora-flower"></i>'],
            ['icofont-flora','<i class="icofont icofont-flora"></i>'],
            ['icofont-gift-box','<i class="icofont icofont-gift-box"></i>'],
            ['icofont-halloween-pumpkin','<i class="icofont icofont-halloween-pumpkin"></i>'],
            ['icofont-hand-power','<i class="icofont icofont-hand-power"></i>'],
            ['icofont-hand-thunder','<i class="icofont icofont-hand-thunder"></i>'],
            ['icofont-king-crown','<i class="icofont icofont-king-crown"></i>'],
            ['icofont-king-monster','<i class="icofont icofont-king-monster"></i>'],
            ['icofont-love','<i class="icofont icofont-love"></i>'],
            ['icofont-magician-hat','<i class="icofont icofont-magician-hat"></i>'],
            ['icofont-native-american','<i class="icofont icofont-native-american"></i>'],
            ['icofont-open-eye','<i class="icofont icofont-open-eye"></i>'],
            ['icofont-owl-look','<i class="icofont icofont-owl-look"></i>'],
            ['icofont-phoenix','<i class="icofont icofont-phoenix"></i>'],
            ['icofont-queen-crown','<i class="icofont icofont-queen-crown"></i>'],
            ['icofont-robot-face','<i class="icofont icofont-robot-face"></i>'],
            ['icofont-sand-clock','<i class="icofont icofont-sand-clock"></i>'],
            ['icofont-shield-alt','<i class="icofont icofont-shield-alt"></i>'],
            ['icofont-ship-wheel','<i class="icofont icofont-ship-wheel"></i>'],
            ['icofont-skull-danger','<i class="icofont icofont-skull-danger"></i>'],
            ['icofont-skull-face','<i class="icofont icofont-skull-face"></i>'],
            ['icofont-snail','<i class="icofont icofont-snail"></i>'],
            ['icofont-snow-alt','<i class="icofont icofont-snow-alt"></i>'],
            ['icofont-snow-flake','<i class="icofont icofont-snow-flake"></i>'],
            ['icofont-snowmobile','<i class="icofont icofont-snowmobile"></i>'],
            ['icofont-space-shuttle','<i class="icofont icofont-space-shuttle"></i>'],
            ['icofont-star-shape','<i class="icofont icofont-star-shape"></i>'],
            ['icofont-swirl','<i class="icofont icofont-swirl"></i>'],
            ['icofont-tattoo-wing','<i class="icofont icofont-tattoo-wing"></i>'],
            ['icofont-throne','<i class="icofont icofont-throne"></i>'],
            ['icofont-touch','<i class="icofont icofont-touch"></i>'],
            ['icofont-tree-alt','<i class="icofont icofont-tree-alt"></i>'],
            ['icofont-triangle','<i class="icofont icofont-triangle"></i>'],
            ['icofont-unity-hand','<i class="icofont icofont-unity-hand"></i>'],
            ['icofont-weed','<i class="icofont icofont-weed"></i>'],
            ['icofont-woman-bird','<i class="icofont icofont-woman-bird"></i>']
        ]
    });
})(Redactor);