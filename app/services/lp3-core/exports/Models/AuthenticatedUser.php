<?php

namespace Services\Lp3Core\Exports\Models;

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * 認証済みユーザー
 */
class AuthenticatedUser implements Authenticatable
{
    public int $id;
    public string $name;

    /**
     * @see Authenticatable::getAuthIdentifierName()
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * @see Authenticatable::getAuthIdentifier()
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * @see Authenticatable::getAuthPassword()
     */
    public function getAuthPassword()
    {
        // 暗号化の有無にかかわらず、パスワードを別のマイクロサービスに公開する必要はないはずなので、空文字列にしている
        return '';
    }

    /**
     * @see Authenticatable::getRememberToken()
     */
    public function getRememberToken()
    {
        // 別のマイクロサービスから利用されることはないはずなので、空文字列を返している
        return '';
    }

    /**
     * @see Authenticatable::setRememberToken()
     */
    public function setRememberToken($value)
    {
        // 別のマイクロサービスから利用されることはないはずなので、特に何もしない
    }

    /**
     * @see Authenticatable::getRememberTokenName()
     */
    public function getRememberTokenName()
    {
        // 別のマイクロサービスから利用されることはないはずなので、空文字列を返している
        return '';
    }
}
