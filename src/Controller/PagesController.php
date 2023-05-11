<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

class PagesController extends AppController
{
    
    public function dashboard()
    {
        $this->viewBuilder()->setLayout('admin');
        $task = $this->getTableLocator()->get('Tasks');
        $user = $this->getTableLocator()->get('User');
        
        $countTask = $task->find()->count();
        $countUser = $user->find()->count();
        $this->set(compact('countTask','countUser'));
        
    }
}
