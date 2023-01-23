<?php
namespace Rpcsvc;

/**
 * 编写客户端
 */
class GreeterClient extends \Grpc\BaseStub
{
    
    function __construct($hostname,$opts,$channel = null)
    {
        parent::__construct($hostname,$opts,$channel);
    }

    /**
    *
    */

    public function check(\Rpcsvc\CheckReq $argument,$metadata=[],$options=[]){
        return $this->_simpleRequest('/rpcsvc.Greeter/Check',$argument,['\Rpcsvc\CheckResp','decode'],$metadata,$options);
    }

}