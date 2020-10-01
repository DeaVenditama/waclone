<?php namespace App\Controllers;

class Home extends BaseController
{
	public function __construct(){
		$this->session = session();
	}

	public function index()
	{
		$id = $this->request->uri->getSegment(3);
		$this->session->set(['idUser'=>$id]);

		$userModel = new \App\Models\UserModel();
		$user = $userModel->find($id);

		$allUsers = $userModel->where('id!='.$id)->findAll();

		return view('index.php',[
			'user'=>$user,
			'allUsers'=>$allUsers,
			'idUser' => $id,
		]);
	}

	public function getRoomByUser()
	{
		if($this->request->isAJAX()){
			$idCurrentUser = $this->session->get('idUser');
			$idReceiver = $this->request->getGet('contactId');

			$roomModel = new \App\Models\RoomModel();
			$room = $roomModel->getRoomByUser([$idCurrentUser,$idReceiver]);

			return $this->response->setJSON($room);
		}
	}

	public function sendMessage()
	{
		if($this->request->isAJAX()){
			$message = $this->request->getPost('message');
			$id_room = $this->request->getPost('id_room');
			$id_user = $this->session->get('idUser');

			$modelChat = new \App\Models\ChatModel();
			$chat = new \App\Entities\Chat();
			$created = date("Y-m-d H:i:s");

			$chat->id_room = $id_room;
			$chat->id_user = $id_user;
			$chat->message = $message;
			$chat->media = '';
			$chat->is_active = 1;
			$chat->created = $created;

			$modelChat->save($chat);

			$chatMessage = [
				'created' => $created,
				'message' => $message,
			];

			return $this->response->setJSON($chatMessage);
		}
	}

	public function getChatsByRoomId()
	{
		if($this->request->isAJAX()){
			$id_room = $this->request->getPost('roomId');
			
			$chatModel = new \App\Models\ChatModel();

			$chats = $chatModel->getChatsByRoom($id_room);

			return $this->response->setJSON($chats);
		}	
	}

	//--------------------------------------------------------------------

}
