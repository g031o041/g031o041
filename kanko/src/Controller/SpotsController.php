<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Spots Controller
 *
 * @property \App\Model\Table\SpotsTable $Spots
 *
 * @method \App\Model\Entity\Spot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpotsController extends AppController
{
  public function isAuthorized($user)
  {
    $action = $this->request->getParam('action');
    // add および tags アクションは、常にログインしているユーザーに許可されます。
    if (in_array($action, ['add'])) {
      return true;
    }

    // 他のすべてのアクションにはスラッグが必要です。
    $id = $this->request->getParam('pass.0');
    if (!$id) {
      return false;
    }

    // 記事が現在のユーザーに属していることを確認します。
    $article = $this->Articles->findBySlug($id)->first();

    return $article->user_id === $user['id'];
  }

  /**
   * Index method
   *
   * @return \Cake\Http\Response|void
   */
  public function index()
  {
    $spots = $this->paginate($this->Spots);

    $this->set(compact('spots'));
  }

  public function search($word = null)
  {
    if ($this->request->is('post')){
      return $this->redirect(['action' => 'search', $this->request->data['検索']]);
    }
    $spots = $this->Spots->find('all')->where(['Spots.spot_name LIKE' => '%'.$word.'%']);
    
    $this->set(compact('spots'));
  }
  
  /**
   * View method
   *
   * @param string|null $id Spot id.
   * @return \Cake\Http\Response|void
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function view($id = null)
  {
    $spot = $this->Spots->get($id, [
        'contain' => ['Routes', 'Tags', 'Users']
    ]);

    $this->set('spot', $spot);
  }

  /**
   * Add method
   *
   * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
   */
  public function add()
  {
    $spot = $this->Spots->newEntity();
    if ($this->request->is('post')) {
      $spot = $this->Spots->patchEntity($spot, $this->request->getData());
      if ($this->Spots->save($spot)) {
        $this->Flash->success(__('The spot has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The spot could not be saved. Please, try again.'));
    }
    $routes = $this->Spots->Routes->find('list', ['limit' => 200]);
    $tags = $this->Spots->Tags->find('list', ['limit' => 200]);
    $users = $this->Spots->Users->find('list', ['limit' => 200]);
    $this->set(compact('spot', 'routes', 'tags', 'users'));
  }

  /**
   * Edit method
   *
   * @param string|null $id Spot id.
   * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
   * @throws \Cake\Network\Exception\NotFoundException When record not found.
   */
  public function edit($id = null)
  {
    $spot = $this->Spots->get($id, [
        'contain' => ['Routes', 'Tags', 'Users']
    ]);
    if ($this->request->is(['patch', 'post', 'put'])) {
      $spot = $this->Spots->patchEntity($spot, $this->request->getData());
      if ($this->Spots->save($spot)) {
        $this->Flash->success(__('The spot has been saved.'));

        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('The spot could not be saved. Please, try again.'));
    }
    $routes = $this->Spots->Routes->find('list', ['limit' => 200]);
    $tags = $this->Spots->Tags->find('list', ['limit' => 200]);
    $users = $this->Spots->Users->find('list', ['limit' => 200]);
    $this->set(compact('spot', 'routes', 'tags', 'users'));
  }

  /**
   * Delete method
   *
   * @param string|null $id Spot id.
   * @return \Cake\Http\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */
  public function delete($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $spot = $this->Spots->get($id);
    if ($this->Spots->delete($spot)) {
      $this->Flash->success(__('The spot has been deleted.'));
    } else {
      $this->Flash->error(__('The spot could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
  }
}
