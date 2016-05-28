<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/27/16
 * Time: 6:19 PM
 */
class UserModel extends Model
{
    /**
     * @return array
     */
    public function getAllUser()
    {
        $sql = 'SELECT * FROM `User`';
        $result = $this->query($sql);
        return $result;
    }

    public function getUser($uid)
    {
        $uid = $this->escapeString($uid);
        $sql = 'SELECT * FROM `User` WHERE
                `uid`="' . $uid . '"
                ';
        $result = $this->query($sql);
        return $result;
    }

    /**
     * @param MUser $user
     * @return array
     */
    public function insertUser(MUser $user)
    {
        $sql = 'INSERT INTO `User`(`uid`, `pid`, `password`, `name`, `phone`, `address`, `type`, `block`, `create_date`, `update_date`, `author`) VALUES (
                "' . $user->getUid() . '",
                "' . $user->getPid() . '",
                "' . $user->getPassword() . '",
                "' . $user->getName() . '",
                "' . $user->getPhone() . '",
                "' . $user->getAddress() . '",
                "' . $user->getType() . '",
                "' . $user->getBlock() . '",
                "' . $user->getCreateDate() . '",
                "' . $user->getUpdateDate() . '",
                "' . $user->getAuthor() . '"
                )';
        $result = $this->execute($sql);
        return $result;
    }

    /**
     * @param MUser $user
     * @return array
     */
    public function updateUser(MUser $user)
    {
        $sql = 'UPDATE `User` SET
                `pid`="' . $user->getPid() . '",
                `password`="' . $user->getPassword() . '",
                `name`="' . $user->getName() . '",
                `phone`="' . $user->getPhone() . '",
                `address`="' . $user->getAddress() . '",
                `type`="' . $user->getType() . '",
                `block`="' . $user->getBlock() . '",
                `update_date`="' . $user->getUpdateDate() . '",
                `author`="' . $user->getAuthor() . '"
                WHERE
                `uid`="' . $user->getUid() . '"
                ';
        $result = $this->execute($sql);
        return $result;
    }

    /**
     * @param MUser $user
     * @return array
     */
    public function deleteUser($uid)
    {
        $uid = $this->escapeString($uid);
        $sql = 'DELETE FROM `User` WHERE
                `uid`="' . $uid . '"
                ';
        $result = $this->execute($sql);
        return $result;
    }

    public function deleteMultiUser($uid_arr)
    {
        $uid_arr = $this->escapeArray($uid_arr);
        $sql = 'DELETE FROM `User` WHERE ';
        for ($x = 0; $x < count($uid_arr); $x++) {
            $sql = $sql . ' `uid`="' . $uid_arr[$x] . '" ';
            if ($x < count($uid_arr) - 1) $sql = $sql . ' OR ';
        }
        $result = $this->execute($sql);
        return $result;
    }
}
