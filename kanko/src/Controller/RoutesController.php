<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Routes Controller
 *
 * @property \App\Model\Table\RoutesTable $Routes
 *
 * @method \App\Model\Entity\Route[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoutesController extends AppController
{
  public function initialize()
  {
    parent::initialize();

    $this->loadComponent('Paginator');
    $this->loadComponent('Flash'); // FlashComponent をインクルード
  }

  /**
   * Index method
   *
   * @return \Cake\Http\Response|void
   */
  public function index()
  {
    $this->paginate = [
      'contain' => ['Users']
    ];
    $routes = $this->paginate($this->Routes);

    $this->set(compact('routes'));
  }

  /**
   * View method
   *
   * @param string|null $id Route id.
   * @return \Cake\Http\Response|void
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function view($id = null)
  {
    $route = $this->Routes->get($id, [
        'contain' => ['Users', 'Spots', 'Tags']
    ]);

    $this->set('route', $route);
  }

  /**
   * Add method
   *
   * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
   */
  public function add()
  {
    $route = $this->Routes->newEntity();
    if ($this->request->is('post')) {
      $route = $this->Routes->patchEntity($route, $this->request->getData());
      $route->user_id = $this->Auth->user('id');
      if ($this->Routes->save($route)) {
        $this->Flash->success(__('The route has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The route could not be saved. Please, try again.'));
    }
    $users = $this->Routes->Users->find('list', ['limit' => 200]);
    $spots = $this->Routes->Spots->find('list', ['limit' => 200]);
    $tags = $this->Routes->Tags->find('list', ['limit' => 200]);
    $this->set(compact('route', 'users', 'spots', 'tags'));
  }

  /**
   * Edit method
   *
   * @param string|null $id Route id.
   * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
  public function edit($id = null)
  {
    $route = $this->Routes->get($id, [
        'contain' => ['Spots', 'Tags']
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $route = $this->Routes->patchEntity($route, $this->request->getData(), 
          ['accessibleFields' => ['user_id' => false]
      ]);
      if ($this->Routes->save($route)) {
        $this->Flash->success(__('The route has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The route could not be saved. Please, try again.'));
    }
    $users = $this->Routes->Users->find('list', ['limit' => 200]);
    $spots = $this->Routes->Spots->find('list', ['limit' => 200]);
    $tags = $this->Routes->Tags->find('list', ['limit' => 200]);
    $this->set(compact('route', 'users', 'spots', 'tags'));
  }

  /**
   * Delete method
   *
   * @param string|null $id Route id.
   * @return \Cake\Http\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $route = $this->Routes->get($id);
    if ($this->Routes->delete($route)) {
      $this->Flash->success(__('The route has been deleted.'));
    } else {
      $this->Flash->error(__('The route could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }

  public function isAuthorized($user)
  {
    $action = $this->request->getParam('action');
    // add および tags アクションは、常にログインしているユーザーに許可されます。
    if (in_array($action, ['add', 'tags'])) {
      return true;
    }

    // 他のすべてのアクションにはスラッグが必要です。
    $id = $this->request->getParam('pass.0');
    if (!$id) {
      return false;
    }

    // 記事が現在のユーザーに属していることを確認します。
    $article = $this->Articles->findById($id)->first();

    return $article->user_id === $user['id'];
  }
}
