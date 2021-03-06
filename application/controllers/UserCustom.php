<?php

/**
 * Tencent is pleased to support the open source community by making 蓝鲸 available.
 * Copyright (C) 2016 THL A29 Limited, a Tencent company. All rights reserved.
 * Licensed under the MIT License (the "License"); you may not use this file except in compliance with the License. You may obtain a copy of the License at
 * http://opensource.org/licenses/MIT
 * Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
 */

class UserCustom extends Cc_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * 查询用户定制数据
     */
    public function getUserCustom() {
        $this->load->logic('UserCustomLogic');
        $data = $this->UserCustomLogic->getUserCustom();

        $result = array();
        $result['success'] = !!$data;
        $data && $result['data'] = $data;
        !$data && $result['message'] = $this->UserCustomLogic->_errInfo;
        $this->output->set_output(json_encode($result));
        return true;
    }

    /**
     * 设置用户定制数据
     */
    public function setUserCustom() {
        $this->load->logic('UserCustomLogic');
        $return = $this->UserCustomLogic->setUserCustom();

        $result = array();
        $result['success'] = $return;
        $result['message'] = $return ? '定制显示列成功！' : $this->UserCustomLogic->_errInfo;
        $this->output->set_output(json_encode($result));
        return true;
    }
}