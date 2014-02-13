<?php
class Feedback extends Feedback_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('feedback_m');

	}

	public function index($id = NULL) {

		$rules = $this->feedback_m->rules;
		$this->form_validation->set_rules($rules);

		//处理表单的提交
		if ($this->form_validation->run() == TRUE) {
			$data = $this->feedback_m->array_from_post(array(
				'name',
				'title',
				'content'
			));
			$this->feedback_m->save($data, $id);
			redirect('feedback');
		}

		$this->load->view('feedback', $this->data);
	}

}