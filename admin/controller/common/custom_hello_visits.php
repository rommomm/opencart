<?php
class ControllerCommonCustomHelloVisits extends Controller {
    public function index() {
        $this->load->language('extension/module/custom_hello');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('extension/module/custom_hello');

        $data['visits'] = $this->model_extension_module_custom_hello->getVisits();

        $data['heading_title'] = $this->language->get('heading_title');
        $data['column_customer'] = $this->language->get('column_customer');
        $data['column_date'] = $this->language->get('column_date');
        $data['text_back'] = $this->language->get('text_back');

        $data['back'] = $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true);

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');
        $data['customerEditLink'] = $this->url->link('customer/customer/edit', 'user_token=' . $this->session->data['user_token'] . '&customer_id=', true);

        $this->response->setOutput($this->load->view('common/custom_hello_visits', $data));

    }
}
