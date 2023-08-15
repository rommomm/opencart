<?php

class ControllerExtensionModuleCustomHello extends Controller
{
    public function index()
    {
        $data['module_custom_hello_status'] = $this->config->get('module_custom_hello_status');
        $data['module_custom_hello_text'] = $this->capitalizeWords($this->config->get('module_custom_hello_text'));
        if ($this->customer->isLogged() && $data['module_custom_hello_status']) {

            $this->load->model('extension/module/custom_hello');

            $this->model_extension_module_custom_hello->saveVisit($this->customer->getId());

            return $this->load->view('extension/module/custom_hello', $data);
        }
    }

    function capitalizeWords($string)
    {
        $words = explode(' ', $string);

        foreach ($words as $i => $word) {
            $words[$i] = ucfirst(strtolower($word));
        }

        return implode(' ', $words);
    }
}