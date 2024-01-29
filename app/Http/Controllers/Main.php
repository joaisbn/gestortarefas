<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class Main extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $data = [
            'title' => 'Gestor de Tarefas',
            'tasks' => $this->_get_tasks(),
        ];

        return view('main', $data);
    }

    /**
     * Login
     *
     * @return void
     */
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];

        return view('login_frm', $data);
    }

    /**
     * Login Submit
     *
     * @return void
     */
    public function login_submit(Request $request)
    {
        // form validation
        $request->validate(
            [
                'text_username' => 'required|min:3',
                'text_password' => 'required|min:3',
            ],
            [
                'text_username.required' => 'O campo é de preenchimento obrigatório.',
                'text_username.min' => 'O campo deve ter no mínimo 3 caracteres.',
                'text_password.required' => 'O campo deve ter no mínimo 3 caracteres.',
                'text_password.min' => 'O campo é de preenchimento obrigatório.',
            ]
        );

        // get form data
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        // check if user exists
        $model = new UserModel();
        $user = $model->where('username', '=', $username)
            ->whereNull('deleted_at')
            ->first();

        if ($user) {
            // check if password is correct
            if (password_verify($password, $user->password)) {
                $session_data = [
                    'id' => $user->id,
                    'username' => $user->username,
                ];

                session()->put($session_data);

                return redirect()->route('index');
            }
        }

        // invalid login
        return redirect()
            ->route('login')
            ->withInput()
            ->with('login_error', 'Login inválido.');
    }

    /**
     * Logout
     *
     * @return void
     */
    public function logout()
    {
        session()->forget('username');
        return redirect()->route('login');
    }

    /**
     * new_task
     *
     * @return void
     */
    public function new_task()
    {
        $data = [
            'title' => 'Nova tarefa'
        ];

        return view('new_task_frm', $data);
    }

    /**
     * new_task_submit
     *
     * @return void
     */
    public function new_task_submit()
    {
        echo 'Guardar nova tarefa';
    }

    /*********************************************************** */
    /** Private methods */
    /*********************************************************** */
    private function _get_tasks()
    {
        $model = new TaskModel();

        return $model
            ->where('id_user', '=', session()->get('id'))
            ->whereNull('deleted_at')
            ->get();
    }
}
