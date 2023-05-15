<?php
namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

/**
 * TODO ログイン機能ができるまではダミーデータ
 */
class AuthorObserver
{
    public function creating(Model $model){
        // $model->created_by = \Auth::user()->id;
        $model->created_by = 1;
    }
    public function updating(Model $model){
        // $model->updated_by = \Auth::user()->id;
        $model->updated_by = 2;
    }
    public function saving(Model $model){
        // $model->updated_by = \Auth::user()->id;
        $model->updated_by = 3;
    }

    // TODO: Deletingだと動作しない問題を調査
    public function deleted(Model $model){
        // $model->deleted_by = \Auth::user()->id;
        $model->deleted_by = 1;
        $model->save();
    }
}
