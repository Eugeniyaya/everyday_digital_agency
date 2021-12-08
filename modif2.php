<?xml version="1.0" encoding="utf-8"?>
<modification>
    <name>Moneymaker 2 Modifications Part 3</name>
    <version>1.0.3</version>
    <author>RGB</author>
    <code>moneymaker2part3</code>
    <link>http://moneymaker2.com</link>
    <file path="catalog/controller/product/product.php">
    <operation>
        <search><![CDATA[$data['text_select'] = $this->language->get('text_select');]]></search>
        <add position="before"><![CDATA[
        /*mmr*/
        $this->document->addStyle('catalog/view/javascript/jquery/owl-carousel/owl.carousel.css');
        $this->document->addStyle('catalog/view/javascript/jquery/owl-carousel/owl.moneymaker2.css');
        $this->document->addScript('catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js');
        $this->document->addScript('catalog/view/javascript/jquery/moneymaker2/bootstrap.rating.input.min.js');
        if ($this->config->get('moneymaker2_modules_quickorder_enabled')) {
            $this->document->addScript('catalog/view/javascript/jquery/moneymaker2/jquery.mask.min.js');
        }
        /*mmr*/
        ]]></add>
    </operation>
    <operation>
        <search><![CDATA[$data['rating'] = (int)$product_info['rating'];]]></search>
        <add position="after"><![CDATA[
        /*mmr*/
        $data['quantity'] = $product_info['quantity'];
        $this->load->language('module/moneymaker2');
        $data['text_downloads'] = $this->language->get('text_downloads');
        $data['moneymaker2_modules_quickorder_enabled'] = $this->config->get('moneymaker2_modules_quickorder_enabled');
        if ($data['moneymaker2_modules_quickorder_enabled']) {
            if ($product_info['image']) {
                $data['quickorder_thumb'] = $this->model_tool_image->resize($product_info['image'], $this->config->get('moneymaker2_modules_quickorder_image_width'), $this->config->get('moneymaker2_modules_quickorder_image_height'));
            } else {
                $data['quickorder_thumb'] = '';
            }
            $data['moneymaker2_modules_quickorder_display_thumb'] = $this->config->get('moneymaker2_modules_quickorder_display_thumb');
            $data['moneymaker2_modules_quickorder_button_title'] = $this->config->get('moneymaker2_modules_quickorder_button_title');
            $data['moneymaker2_modules_quickorder_button_title'] = $data['moneymaker2_modules_quickorder_button_title'][$this->config->get('config_language_id')];
            $data['moneymaker2_modules_quickorder_phone_mask_enabled'] = $this->config->get('moneymaker2_modules_quickorder_phone_mask_enabled');
            $data['moneymaker2_modules_quickorder_phone_mask'] = $this->config->get('moneymaker2_modules_quickorder_phone_mask');
            $data['text_optional'] = $this->language->get('text_optional');
            $data['text_quickorder_phone'] = $this->language->get('text_quickorder_phone');
            $data['text_quickorder_comment'] = $this->language->get('text_quickorder_comment');
            $data['text_quickorder_help'] = $this->language->get('text_quickorder_help');
            $data['button_quickorder_success_message'] = $this->language->get('button_quickorder_success_message');
            $data['error_quickorder_phone'] = $this->language->get('error_quickorder_phone');
        }
        $data['moneymaker2_product_metatitles_enabled'] = $this->config->get('moneymaker2_product_metatitles_enabled');
        if ($data['moneymaker2_product_metatitles_enabled']) {
            $data['meta_title'] = $product_info['meta_title'];
        }
        $data['moneymaker2_product_socials_enabled'] = $this->config->get('moneymaker2_product_socials_enabled');
        if ($this->config->get('moneymaker2_product_code')&&$this->config->get('moneymaker2_product_code_field')&&isset($product_info[$this->config->get('moneymaker2_product_code_field')])&&$product_info[$this->config->get('moneymaker2_product_code_field')]) {
            $moneymaker2_product_code_caption = $this->config->get('moneymaker2_product_code_caption');
            $data['moneymaker2_code'] = $moneymaker2_product_code_caption[$this->config->get('config_language_id')].$product_info[$this->config->get('moneymaker2_product_code_field')];
        } else {
            $data['moneymaker2_code'] = '';
        }
        $data['moneymaker2_common_buy_hide'] = $this->config->get('moneymaker2_common_buy_hide');
        $data['moneymaker2_common_wishlist_hide'] = $this->config->get('moneymaker2_common_wishlist_hide');
        $data['moneymaker2_common_wishlist_caption'] = $this->config->get('moneymaker2_common_wishlist_caption');
        $data['moneymaker2_common_compare_hide'] = $this->config->get('moneymaker2_common_compare_hide');
        $data['moneymaker2_common_compare_caption'] = $this->config->get('moneymaker2_common_compare_caption');
        $data['moneymaker2_common_cart_outofstock_disabled'] = $this->config->get('moneymaker2_common_cart_outofstock_disabled');
        $data['moneymaker2_common_price_detached'] = $this->config->get('moneymaker2_common_price_detached');
        if ($this->config->get('moneymaker2_product_gallery_animation')) {
            $this->document->addStyle('catalog/view/theme/moneymaker2/stylesheet/mfp.effects.css');
        }
        $data['moneymaker2_product_gallery_moved'] = $this->config->get('moneymaker2_product_gallery_moved');
        $data['moneymaker2_product_gallery_round'] = $this->config->get('moneymaker2_product_gallery_round');
        $data['moneymaker2_product_gallery_animation'] = $this->config->get('moneymaker2_product_gallery_animation');
        $data['moneymaker2_product_gallery_animation_in'] = $this->config->get('moneymaker2_product_gallery_animation_in');
        $data['moneymaker2_product_thumbs_limit'] = $this->config->get('moneymaker2_product_thumbs_limit');
        $data['moneymaker2_product_points_size'] = $this->config->get('moneymaker2_product_points_size');
        if ($this->config->get('moneymaker2_product_points_stock')&&$product_info['quantity'] <= 0) {
            $data['moneymaker2_product_points_stock_id'] = $product_info['stock_status_id'];
            $data['moneymaker2_product_points_stock'] = $this->config->get('moneymaker2_product_points_stock');
            $data['moneymaker2_product_points_stock_icon'] = $this->config->get('moneymaker2_product_points_stock_icon');
            $data['moneymaker2_product_points_stock_icon'] = $data['moneymaker2_product_points_stock_icon'][$product_info['stock_status_id']];
            $data['moneymaker2_product_points_stock_caption'] = $this->config->get('moneymaker2_product_points_stock_caption');
            $data['moneymaker2_product_points_stock_caption'] = $data['moneymaker2_product_points_stock_caption'][$product_info['stock_status_id']][$this->config->get('config_language_id')];
        } else if ($this->config->get('moneymaker2_product_points_stock')&&$this->config->get('moneymaker2_product_points_stock_default')) {
            $data['moneymaker2_product_points_stock_id'] = $this->config->get('moneymaker2_product_points_stock_default');
            $data['moneymaker2_product_points_stock'] = $this->config->get('moneymaker2_product_points_stock');
            $data['moneymaker2_product_points_stock_icon'] = $this->config->get('moneymaker2_product_points_stock_icon');
            $data['moneymaker2_product_points_stock_icon'] = $data['moneymaker2_product_points_stock_icon'][$this->config->get('moneymaker2_product_points_stock_default')];
            $data['moneymaker2_product_points_stock_caption'] = $this->config->get('moneymaker2_product_points_stock_caption');
            $data['moneymaker2_product_points_stock_caption'] = $data['moneymaker2_product_points_stock_caption'][$this->config->get('moneymaker2_product_points_stock_default')][$this->config->get('config_language_id')];
        } else {
            $data['moneymaker2_product_points_stock'] = '';
        }
        $data['moneymaker2_product_points_manufacturer'] = $this->config->get('moneymaker2_product_points_manufacturer');
        if ($data['moneymaker2_product_points_manufacturer']) {
            $data['moneymaker2_manufacturer_image'] = $product_info['manufacturer_image'] ? $this->model_tool_image->resize($product_info['manufacturer_image'], $this->config->get('moneymaker2_product_points_manufacturer_image_width'), $this->config->get('moneymaker2_product_points_manufacturer_image_height')) : $this->model_tool_image->resize('no_image.png', $this->config->get('moneymaker2_product_points_manufacturer_image_width'), $this->config->get('moneymaker2_product_points_manufacturer_image_height'));
            $data['moneymaker2_product_points_manufacturer_caption'] = $this->config->get('moneymaker2_product_points_manufacturer_caption');
            $data['moneymaker2_product_points_manufacturer_caption'] = $data['moneymaker2_product_points_manufacturer_caption'][$this->config->get('config_language_id')];
        }
        $data['moneymaker2_product_points'] = array();
        $moneymaker2_product_points = $this->config->get('moneymaker2_product_points');
        if (!empty($moneymaker2_product_points)){
            if (isset ($this->request->get['path'])) {
                $moneymaker2_product_categories = explode('_', $this->request->get['path']);
                $moneymaker2_product_category_id = $moneymaker2_product_categories[count($moneymaker2_product_categories) - 1];
            } else {
                $moneymaker2_product_category = $this->model_catalog_product->getCategories($product_info['product_id']);
                $moneymaker2_product_category_id = $moneymaker2_product_category[0]['category_id'];
            }
            if ($moneymaker2_product_category_id){
                foreach ($moneymaker2_product_points as $key => $value) {
                    if (isset($value['categories'])&&in_array($moneymaker2_product_category_id, $value['categories'])) {
                    $data['moneymaker2_product_points'][] = array(
                        'icon'          => $value['icon'],
                        'categories'    => isset($value['categories']) ? $value['categories'] : array(0),
                        'name'          => $value['name'][$this->config->get('config_language_id')],
                        'text'          => html_entity_decode($value['text'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8'),
                    );
                    $moneymaker2_product_points_sort_order[$key] = $value['sort_order'];
                    }
                }
                if (isset($moneymaker2_product_points_sort_order)) {
                    array_multisort($moneymaker2_product_points_sort_order, SORT_ASC, $data['moneymaker2_product_points']);
                }
            }
        }
        $data['button_reviews'] = $this->language->get('button_reviews');
        $data['button_submit'] = $this->language->get('button_submit');
        $data['button_shopping'] = $this->language->get('button_shopping');

        $data['moneymaker2_stickers_mode'] = $this->config->get('moneymaker2_modules_stickers_mode');
        $data['moneymaker2_stickers_size_product'] = $this->config->get('moneymaker2_modules_stickers_size_product');
        $moneymaker2_stickers = array();
        if ($product_info['special']) {
            if ($this->config->get('moneymaker2_modules_stickers_specials_enabled')) {
                $moneymaker2_modules_stickers_specials_caption = $this->config->get('moneymaker2_modules_stickers_specials_caption');
                $moneymaker2_modules_stickers_specials_discount = $this->config->get('moneymaker2_modules_stickers_specials_discount') ? ($this->config->get('moneymaker2_modules_stickers_specials_discount_mode') ? "-".round(100-(($product_info['special']/$product_info['price'])*100))."%" : $this->currency->format((($product_info['special'])-($product_info['price']))*(-1))) : '';
                $moneymaker2_stickers[] = array(
                    'type' => 'special',
                    'icon' => $this->config->get('moneymaker2_modules_stickers_specials_icon'),
                    'caption' => $this->config->get('moneymaker2_modules_stickers_specials_discount') ? "<b>".$moneymaker2_modules_stickers_specials_discount."</b> ".$moneymaker2_modules_stickers_specials_caption[$this->config->get('config_language_id')] : $moneymaker2_modules_stickers_specials_caption[$this->config->get('config_language_id')],
                );
            }
        }
        if ($product_info['viewed']) {
            if ($this->config->get('moneymaker2_modules_stickers_popular_enabled')) {
                if ($product_info['viewed']>=$this->config->get('moneymaker2_modules_stickers_popular_limit')) {
                    $moneymaker2_modules_stickers_popular_caption = $this->config->get('moneymaker2_modules_stickers_popular_caption');
                    $moneymaker2_stickers[] = array(
                        'type' => 'popular',
                        'icon' => $this->config->get('moneymaker2_modules_stickers_popular_icon'),
                        'caption' => $moneymaker2_modules_stickers_popular_caption[$this->config->get('config_language_id')],
                    );
                }
            }
        }
        if ($product_info['rating']) {
            if ($this->config->get('moneymaker2_modules_stickers_rated_enabled')) {
                if ($product_info['rating']>=$this->config->get('moneymaker2_modules_stickers_rated_limit')) {
                    $moneymaker2_modules_stickers_rated_caption = $this->config->get('moneymaker2_modules_stickers_rated_caption');
                    $moneymaker2_stickers[] = array(
                        'type' => 'rated',
                        'icon' => $this->config->get('moneymaker2_modules_stickers_rated_icon'),
                        'caption' => $moneymaker2_modules_stickers_rated_caption[$this->config->get('config_language_id')],
                    );
                }
            }
        }
        if ($product_info['date_available']) {
            if ($this->config->get('moneymaker2_modules_stickers_new_enabled')) {
                if ((round((strtotime(date("Y-m-d"))-strtotime($product_info['date_available']))/86400))<=$this->config->get('moneymaker2_modules_stickers_new_limit')) {
                    $moneymaker2_modules_stickers_new_caption = $this->config->get('moneymaker2_modules_stickers_new_caption');
                    $moneymaker2_stickers[] = array(
                        'type' => 'new',
                        'icon' => $this->config->get('moneymaker2_modules_stickers_new_icon'),
                        'caption' => $moneymaker2_modules_stickers_new_caption[$this->config->get('config_language_id')],
                    );
                }
            }
        }
        if (isset($product_info[$this->config->get('moneymaker2_modules_stickers_custom1_field')])&&$product_info[$this->config->get('moneymaker2_modules_stickers_custom1_field')]) {
            if ($this->config->get('moneymaker2_modules_stickers_custom1_enabled')) {
                $moneymaker2_modules_stickers_custom1_caption = $this->config->get('moneymaker2_modules_stickers_custom1_caption');
                $moneymaker2_stickers[] = array(
                    'type' => 'custom1',
                    'icon' => $this->config->get('moneymaker2_modules_stickers_custom1_icon'),
                    'caption' => $moneymaker2_modules_stickers_custom1_caption[$this->config->get('config_language_id')],
                );
            }
        }
        if (isset($product_info[$this->config->get('moneymaker2_modules_stickers_custom2_field')])&&$product_info[$this->config->get('moneymaker2_modules_stickers_custom2_field')]) {
            if ($this->config->get('moneymaker2_modules_stickers_custom2_enabled')) {
                $moneymaker2_modules_stickers_custom2_caption = $this->config->get('moneymaker2_modules_stickers_custom2_caption');
                $moneymaker2_stickers[] = array(
                    'type' => 'custom2',
                    'icon' => $this->config->get('moneymaker2_modules_stickers_custom2_icon'),
                    'caption' => $moneymaker2_modules_stickers_custom2_caption[$this->config->get('config_language_id')],
                );
            }
        }
        $data['stickers'] = $moneymaker2_stickers;

        $data['moneymaker2_product_options_hide'] = $this->config->get('moneymaker2_product_options_hide');
        $data['moneymaker2_product_options_hide_limit'] = $this->config->get('moneymaker2_product_options_hide_limit');
        $data['moneymaker2_product_tabs_hide'] = $this->config->get('moneymaker2_product_tabs_hide');
        $data['moneymaker2_product_tabs_headers'] = $this->config->get('moneymaker2_product_tabs_headers');
        if ($data['moneymaker2_product_tabs_headers']) {
            $data['moneymaker2_product_tabs_headers_text'] = $this->config->get('moneymaker2_product_tabs_headers_text');
            if ($data['moneymaker2_product_tabs_headers']==1) {
                $data['moneymaker2_product_description_header'] = $data['tab_description']." ".$data['heading_title'];
                $data['moneymaker2_product_attribute_header'] = $data['tab_attribute']." ".$data['heading_title'];
                $data['moneymaker2_product_review_header'] = $data['button_reviews']." ".$data['heading_title'];
            } else if ($data['moneymaker2_product_tabs_headers']==2) {
                $data['moneymaker2_product_description_header'] = $data['heading_title']." ".$data['tab_description'];
                $data['moneymaker2_product_attribute_header'] = $data['heading_title']." ".$data['tab_attribute'];
                $data['moneymaker2_product_review_header'] = $data['heading_title']." ".$data['button_reviews'];
            } else if ($data['moneymaker2_product_tabs_headers']==3) {
                $data['moneymaker2_product_description_header'] = $data['tab_description']." ".$data['moneymaker2_product_tabs_headers_text'][$this->config->get('config_language_id')]." ".$data['heading_title'];
                $data['moneymaker2_product_attribute_header'] = $data['tab_attribute']." ".$data['moneymaker2_product_tabs_headers_text'][$this->config->get('config_language_id')]." ".$data['heading_title'];
                $data['moneymaker2_product_review_header'] = $data['button_reviews']." ".$data['moneymaker2_product_tabs_headers_text'][$this->config->get('config_language_id')]." ".$data['heading_title'];
            } else if ($data['moneymaker2_product_tabs_headers']==4) {
                $data['moneymaker2_product_description_header'] = $data['heading_title']." ".$data['moneymaker2_product_tabs_headers_text'][$this->config->get('config_language_id')]." ".$data['tab_description'];
                $data['moneymaker2_product_attribute_header'] = $data['heading_title']." ".$data['moneymaker2_product_tabs_headers_text'][$this->config->get('config_language_id')]." ".$data['tab_attribute'];
                $data['moneymaker2_product_review_header'] = $data['heading_title']." ".$data['moneymaker2_product_tabs_headers_text'][$this->config->get('config_language_id')]." ".$data['button_reviews'];
            }
        }
        $data['moneymaker2_product_tabs_attributes_responsive'] = $this->config->get('moneymaker2_product_tabs_attributes_responsive');
        /*mmr*/
        ]]></add>
    </operation>
    <operation>
        <search><![CDATA[$data['products'][] = array(]]></search>
        <add position="replace"><![CDATA[
        /*mmr*/
        $data['moneymaker2_stickers_size_catalog'] = $this->config->get('moneymaker2_modules_stickers_size_catalog');
        $moneymaker2_stickers = array();
        if ($special) {
            if ($this->config->get('moneymaker2_modules_stickers_specials_enabled')) {
                $moneymaker2_modules_stickers_specials_caption = $this->config->get('moneymaker2_modules_stickers_specials_caption');
                $moneymaker2_modules_stickers_specials_discount = $this->config->get('moneymaker2_modules_stickers_specials_discount') ? ($this->config->get('moneymaker2_modules_stickers_specials_discount_mode') ? "-".round(100-(($result['special']/$result['price'])*100))."%" : $this->currency->format((($result['special'])-($result['price']))*(-1))) : '';
                $moneymaker2_stickers[] = array(
                    'type' => 'special',
                    'icon' => $this->config->get('moneymaker2_modules_stickers_specials_icon'),
                    'caption' => $this->config->get('moneymaker2_modules_stickers_specials_discount') ? "<b>".$moneymaker2_modules_stickers_specials_discount."</b> ".$moneymaker2_modules_stickers_specials_caption[$this->config->get('config_language_id')] : $moneymaker2_modules_stickers_specials_caption[$this->config->get('config_language_id')],
                );
            }
        }
        if ($result['viewed']) {
            if ($this->config->get('moneymaker2_modules_stickers_popular_enabled')) {
                if ($result['viewed']>=$this->config->get('moneymaker2_modules_stickers_popular_limit')) {
                    $moneymaker2_modules_stickers_popular_caption = $this->config->get('moneymaker2_modules_stickers_popular_caption');
                    $moneymaker2_stickers[] = array(
                        'type' => 'popular',
                        'icon' => $this->config->get('moneymaker2_modules_stickers_popular_icon'),
                        'caption' => $moneymaker2_modules_stickers_popular_caption[$this->config->get('config_language_id')],
                    );
                }
            }
        }
        if ($result['rating']) {
            if ($this->config->get('moneymaker2_modules_stickers_rated_enabled')) {
                if ($result['rating']>=$this->config->get('moneymaker2_modules_stickers_rated_limit')) {
                    $moneymaker2_modules_stickers_rated_caption = $this->config->get('moneymaker2_modules_stickers_rated_caption');
                    $moneymaker2_stickers[] = array(
                        'type' => 'rated',
                        'icon' => $this->config->get('moneymaker2_modules_stickers_rated_icon'),
                        'caption' => $moneymaker2_modules_stickers_rated_caption[$this->config->get('config_language_id')],
                    );
                }
            }
        }
        if ($result['date_available']) {
            if ($this->config->get('moneymaker2_modules_stickers_new_enabled')) {
                if ((round((strtotime(date("Y-m-d"))-strtotime($result['date_available']))/86400))<=$this->config->get('moneymaker2_modules_stickers_new_limit')) {
                    $moneymaker2_modules_stickers_new_caption = $this->config->get('moneymaker2_modules_stickers_new_caption');
                    $moneymaker2_stickers[] = array(
                        'type' => 'new',
                        'icon' => $this->config->get('moneymaker2_modules_stickers_new_icon'),
                        'caption' => $moneymaker2_modules_stickers_new_caption[$this->config->get('config_language_id')],
                    );
                }
            }
        }
        if (isset($result[$this->config->get('moneymaker2_modules_stickers_custom1_field')])&&$result[$this->config->get('moneymaker2_modules_stickers_custom1_field')]) {
            if ($this->config->get('moneymaker2_modules_stickers_custom1_enabled')) {
                $moneymaker2_modules_stickers_custom1_caption = $this->config->get('moneymaker2_modules_stickers_custom1_caption');
                $moneymaker2_stickers[] = array(
                    'type' => 'custom1',
                    'icon' => $this->config->get('moneymaker2_modules_stickers_custom1_icon'),
                    'caption' => $moneymaker2_modules_stickers_custom1_caption[$this->config->get('config_language_id')],
                );
            }
        }
        if (isset($result[$this->config->get('moneymaker2_modules_stickers_custom2_field')])&&$result[$this->config->get('moneymaker2_modules_stickers_custom2_field')]) {
            if ($this->config->get('moneymaker2_modules_stickers_custom2_enabled')) {
                $moneymaker2_modules_stickers_custom2_caption = $this->config->get('moneymaker2_modules_stickers_custom2_caption');
                $moneymaker2_stickers[] = array(
                    'type' => 'custom2',
                    'icon' => $this->config->get('moneymaker2_modules_stickers_custom2_icon'),
                    'caption' => $moneymaker2_modules_stickers_custom2_caption[$this->config->get('config_language_id')],
                );
            }
        }
        $data['products'][] = array(
            'stickers'    => $moneymaker2_stickers,
            'quantity'    => $result['quantity'],
            'sort_order'  => $result['sort_order'],
        /*mmr*/
        ]]></add>
    </operation>
    <operation>
        <search><![CDATA[public function getRecurringDescription() {]]></search>
        <add position="before"><![CDATA[
        /*mmr*/
        public function addquickorder() {
            $this->load->language('module/moneymaker2');
            $this->load->language('checkout/cart');

            $data = array();
            $json = array();

            if (isset($this->request->post['product_id'])) {
                $product_id = (int)$this->request->post['product_id'];
                $this->load->model('account/customer');
                $this->load->model('catalog/product');
                $product_info = $this->model_catalog_product->getProduct($product_id);
            } else {
                $product_id = 0;
                $json['error']['validation'] = $this->language->get('error_quickorder_product_undefined');
            }

            if (isset($this->request->post['quantity']) && ((int)$this->request->post['quantity'] > $product_info['quantity']) && !$this->config->get('config_stock_checkout')) {
                $json['error']['validation'] = $this->language->get('error_quickorder_product_quantity');
            }

            if (isset($this->request->post['quantity']) && ((int)$this->request->post['quantity'] >= $product_info['minimum'])) {
                $quantity = (int)$this->request->post['quantity'];
            } else {
                $json['error']['validation'] = sprintf($this->language->get('error_minimum'), $product_info['name'], $product_info['minimum']);
            }

            if (isset($this->request->post['option'])) {
                $option = array_filter($this->request->post['option']);
            } else {
                $option = array();
            }

            $product_options = $this->model_catalog_product->getProductOptions($this->request->post['product_id']);

            foreach ($product_options as $product_option) {
                if ($product_option['required'] && empty($option[$product_option['product_option_id']])) {
                    $json['error']['option'][$product_option['product_option_id']] = sprintf($this->language->get('error_required'), $product_option['name']);
                    $json['error']['validation'] = $this->language->get('error_quickorder_product_options');
                }
            }

            if (isset($this->request->post['recurring_id'])) {
                $recurring_id = $this->request->post['recurring_id'];
            } else {
                $recurring_id = 0;
            }

            $recurrings = $this->model_catalog_product->getProfiles($product_info['product_id']);

            if ($recurrings) {
                $recurring_ids = array();

                foreach ($recurrings as $recurring) {
                    $recurring_ids[] = $recurring['recurring_id'];
                }

                if (!in_array($recurring_id, $recurring_ids)) {
                    $json['error']['recurring'] = $this->language->get('error_recurring_required');
                }
            }


            if (!isset($this->request->post['quickorderphone'])||!$this->request->post['quickorderphone']) {
                $json['error']['validation'] = $this->language->get('error_quickorder_phone');
            }

            if (!$json) {
                if ($this->config->get('moneymaker2_modules_quickorder_clear_cart')) {
                    $this->cart->clear();
                }
                $this->cart->add($product_id, $quantity, $option, $recurring_id);

                $data['telephone'] = (string)$this->request->post['quickorderphone'];
                $customer = $this->getCustomerByPhone($data['telephone']);

                if(empty($customer)) {
                    $data['firstname']='Quick Order';
                    $data['lastname'] = (string)$this->request->post['quickorderphone'];
                    $data['fax']='';
                    $data['password']='';
                    $data['company']='Quick Order';
                    $data['address_1']='Quick Order';
                    $data['address_2']='';
                    $data['tax_id']='';
                    $data['postcode']='';
                    $data['country_id']=$this->config->get('country_id');
                    $data['company_id']='';
                    $data['zone_id']='';
                    $data['approval']='1';
                    $data['city']='Quick Order';
                    $data['email']= 'quickorder'.'@'.substr(preg_replace("#/$#", "", $this->config->get('config_url')), 7);
                    $this->model_account_customer->addCustomer($data);
                }
                $customer = $this->getCustomerByPhone($data['telephone']);

                /*Totals*/
                $this->load->model('extension/extension');

                $total_data = array();
                $total = 0;
                $taxes = $this->cart->getTaxes();

                $sort_order = array();

                $results = $this->model_extension_extension->getExtensions('total');

                foreach ($results as $key => $value) {
                    $sort_order[$key] = $this->config->get($value['code'] . '_sort_order');
                }

                array_multisort($sort_order, SORT_ASC, $results);

                foreach ($results as $result) {
                    if ($this->config->get($result['code'] . '_status')) {
                        $this->load->model('total/' . $result['code']);

                        $this->{'model_total_' . $result['code']}->getTotal($total_data, $total, $taxes);
                    }
                }

                $sort_order = array();

                foreach ($total_data as $key => $value) {
                    $sort_order[$key] = $value['sort_order'];
                }

                array_multisort($sort_order, SORT_ASC, $total_data);

                $data['invoice_prefix'] = $this->config->get('config_invoice_prefix');
                $data['store_id'] = $this->config->get('config_store_id');
                $data['store_name'] = $this->config->get('config_name');

                if ($data['store_id']) {
                    $data['store_url'] = $this->config->get('config_url');
                } else {
                    $data['store_url'] = HTTP_SERVER;
                }

                /*if ($this->customer->isLogged() && isset($this->session->data['payment_address_id'])) {*/
                if ($this->customer->isLogged()) {
                    $data['customer_id'] = $this->customer->getId();
                    $data['customer_group_id'] = $this->config->get('config_customer_group_id');
                    $data['firstname'] = $this->customer->getFirstName();
                    $data['lastname'] = $this->customer->getLastName();
                    $data['email'] = $this->customer->getEmail();
                    $data['telephone'] = $this->customer->getTelephone();
                    $data['fax'] = $this->customer->getFax();
                    /*$this->load->model('account/address');*/
                    /*$payment_address = $this->model_account_address->getAddress($this->session->data['payment_address_id']);*/
                } elseif (isset($this->session->data['guest'])) {
                    $data['customer_id'] = 0;
                    $data['customer_group_id'] = $this->session->data['guest']['customer_group_id'];
                    $data['firstname'] = $this->session->data['guest']['firstname'];
                    $data['lastname'] = $this->session->data['guest']['lastname'];
                    $data['email'] = $this->session->data['guest']['email'];
                    $data['telephone'] = $this->session->data['guest']['telephone'];
                    $data['fax'] = $this->session->data['guest']['fax'];
                    /*$payment_address = $this->session->data['guest']['payment'];*/
                } else {
                    $data['customer_id'] = $customer['customer_id'];
                    $data['customer_group_id'] = $customer['customer_group_id'];
                    $data['firstname'] = $customer['firstname'];
                    $data['lastname'] = $customer['lastname'];
                    $data['email']= 'quickorder'.'@'.substr(preg_replace("#/$#", "", $this->config->get('config_url')), 7);
                    $data['telephone'] = $customer['telephone'];
                    $data['fax'] = $customer['fax'];
                }

                $data['payment_firstname'] = isset($payment_address['firstname']) ? $payment_address['firstname'] : '';
                $data['payment_lastname'] = isset($payment_address['lastname']) ? $payment_address['lastname'] : '';
                $data['payment_company'] = isset($payment_address['company']) ? $payment_address['company'] : '';
                $data['payment_company_id'] = isset($payment_address['company_id']) ? $payment_address['company_id'] : '';
                $data['payment_tax_id'] = isset($payment_address['tax_id']) ? $payment_address['tax_id'] : '';
                $data['payment_address_1'] = isset($payment_address['address_1']) ? $payment_address['address_1'] : '';
                $data['payment_address_2'] = isset($payment_address['address_2']) ? $payment_address['address_2'] : '';
                $data['payment_city'] = isset($payment_address['city']) ? $payment_address['city'] : '';
                $data['payment_postcode'] = isset($payment_address['postcode']) ? $payment_address['postcode'] : '';
                $data['payment_zone'] = isset($payment_address['zone']) ? $payment_address['zone'] : '';
                $data['payment_zone_id'] = isset($payment_address['zone_id']) ? $payment_address['zone_id'] : '';
                $data['payment_country'] = isset($payment_address['country']) ? $payment_address['country'] : '';
                $data['payment_country_id'] = isset($payment_address['country_id']) ? $payment_address['country_id'] : '';
                $data['payment_address_format'] = isset($payment_address['address_format']) ? $payment_address['address_format'] : '';

                $data['payment_method'] = '';
                $data['payment_code'] = 'cod'; /*for correct order preview @admin*/

                $data['shipping_firstname'] = '';
                $data['shipping_lastname'] = '';
                $data['shipping_company'] = '';
                $data['shipping_address_1'] = '';
                $data['shipping_address_2'] = '';
                $data['shipping_city'] = '';
                $data['shipping_postcode'] = '';
                $data['shipping_zone'] = '';
                $data['shipping_zone_id'] = '';
                $data['shipping_country'] = '';
                $data['shipping_country_id'] = '';
                $data['shipping_address_format'] = '';
                $data['shipping_method'] = '';
                $data['shipping_code'] = '';

                $product_data = array();

                foreach ($this->cart->getProducts() as $product) {
                    $option_data = array();

                    foreach ($product['option'] as $option) {
                        $option_data[] = array(
                            'product_option_id'       => $option['product_option_id'],
                            'product_option_value_id' => $option['product_option_value_id'],
                            'option_id'               => $option['option_id'],
                            'option_value_id'         => $option['option_value_id'],
                            'name'                    => $option['name'],
                            'value'                   => $option['value'],
                            'type'                    => $option['type']
                        );
                    }

                    $product_data[] = array(
                        'product_id' => $product['product_id'],
                        'name'       => $product['name'],
                        'model'      => $product['model'],
                        'option'     => $option_data,
                        'download'   => $product['download'],
                        'quantity'   => $product['quantity'],
                        'subtract'   => $product['subtract'],
                        'price'      => $product['price'],
                        'total'      => $product['total'],
                        'tax'        => $this->tax->getTax($product['price'], $product['tax_class_id']),
                        'reward'     => $product['reward']
                    );
                }

                /*Gift Voucher*/
                $voucher_data = array();

                if (!empty($this->session->data['vouchers'])) {
                    foreach ($this->session->data['vouchers'] as $voucher) {
                        $voucher_data[] = array(
                            'description'      => $voucher['description'],
                            'code'             => token(10),
                            'to_name'          => $voucher['to_name'],
                            'to_email'         => $voucher['to_email'],
                            'from_name'        => $voucher['from_name'],
                            'from_email'       => $voucher['from_email'],
                            'voucher_theme_id' => $voucher['voucher_theme_id'],
                            'message'          => $voucher['message'],
                            'amount'           => $voucher['amount']
                        );
                    }
                }

                $data['products'] = $product_data;
                $data['vouchers'] = $voucher_data;
                $data['totals'] = $total_data;
                if (isset($this->request->post['quickordercomment'])) {
                    $data['comment'] = $this->request->post['quickordercomment'];
                } else {
                    $data['comment'] = '';
                }
                $data['total'] = $total;

                if (isset($this->request->cookie['tracking'])) {
                    $data['tracking'] = $this->request->cookie['tracking'];

                    $subtotal = $this->cart->getSubTotal();

                    /*Affiliate*/
                    $this->load->model('affiliate/affiliate');

                    $affiliate_info = $this->model_affiliate_affiliate->getAffiliateByCode($this->request->cookie['tracking']);

                    if ($affiliate_info) {
                        $data['affiliate_id'] = $affiliate_info['affiliate_id'];
                        $data['commission'] = ($subtotal / 100) * $affiliate_info['commission'];
                    } else {
                        $data['affiliate_id'] = 0;
                        $data['commission'] = 0;
                    }

                    /*Marketing*/
                    $this->load->model('checkout/marketing');

                    $marketing_info = $this->model_checkout_marketing->getMarketingByCode($this->request->cookie['tracking']);

                    if ($marketing_info) {
                        $data['marketing_id'] = $marketing_info['marketing_id'];
                    } else {
                        $data['marketing_id'] = 0;
                    }
                } else {
                    $data['affiliate_id'] = 0;
                    $data['commission'] = 0;
                    $data['marketing_id'] = 0;
                    $data['tracking'] = '';
                }

                $data['language_id'] = $this->config->get('config_language_id');
                $data['currency_id'] = $this->currency->getId();
                $data['currency_code'] = $this->currency->getCode();
                $data['currency_value'] = $this->currency->getValue($this->currency->getCode());
                $data['ip'] = $this->request->server['REMOTE_ADDR'];

                if (!empty($this->request->server['HTTP_X_FORWARDED_FOR'])) {
                    $data['forwarded_ip'] = $this->request->server['HTTP_X_FORWARDED_FOR'];
                } elseif (!empty($this->request->server['HTTP_CLIENT_IP'])) {
                    $data['forwarded_ip'] = $this->request->server['HTTP_CLIENT_IP'];
                } else {
                    $data['forwarded_ip'] = '';
                }

                if (isset($this->request->server['HTTP_USER_AGENT'])) {
                    $data['user_agent'] = $this->request->server['HTTP_USER_AGENT'];
                } else {
                    $data['user_agent'] = '';
                }

                if (isset($this->request->server['HTTP_ACCEPT_LANGUAGE'])) {
                    $data['accept_language'] = $this->request->server['HTTP_ACCEPT_LANGUAGE'];
                } else {
                    $data['accept_language'] = '';
                }

                $this->load->model('checkout/order');

                $this->session->data['order_id'] = $this->model_checkout_order->addOrder($data);
                $this->model_checkout_order->addOrderHistory($this->session->data['order_id'], 1);

                $json['success'] = sprintf($this->language->get('text_quickorder_success_message'), $this->session->data['order_id']);
            }

            $this->cart->clear();

            unset($this->session->data['shipping_method']);
            unset($this->session->data['shipping_methods']);
            unset($this->session->data['payment_method']);
            unset($this->session->data['payment_methods']);
            unset($this->session->data['guest']);
            unset($this->session->data['comment']);
            unset($this->session->data['order_id']);
            unset($this->session->data['coupon']);
            unset($this->session->data['reward']);
            unset($this->session->data['voucher']);
            unset($this->session->data['vouchers']);
            unset($this->session->data['totals']);

            $json['total'] = sprintf($this->language->get('text_items'), 0, $this->currency->format(0));

            $this->response->setOutput(json_encode($json));
        }

        private function getCustomerByPhone($telephone) {
            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE telephone = '" . $this->db->escape($telephone) . "'");
            return $query->row;
        }
        /*mmr*/
        ]]></add>
    </operation>
    </file>

    <file path="catalog/model/catalog/product.php">
    <operation>
        <search><![CDATA['stock_status'     => $query->row['stock_status'],]]></search>
        <add position="after"><![CDATA[
        'stock_status_id'     => $query->row['stock_status_id'],
        ]]></add>
    </operation>
    <operation>
        <search><![CDATA[m.name AS manufacturer,]]></search>
        <add position="replace"><![CDATA[m.name AS manufacturer, m.image AS manufacturer_image,]]></add>
    </operation>
    <operation>
        <search><![CDATA['manufacturer'     => $query->row['manufacturer'],]]></search>
        <add position="after"><![CDATA['manufacturer_image'     => $query->row['manufacturer_image'],]]></add>
    </operation>
    </file>

</modification>