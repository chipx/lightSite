<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chipx
 * Date: 06.02.13
 * Time: 8:32
 * To change this template use File | Settings | File Templates.
 */
class MyAccessControlFilter extends CAccessControlFilter
{
    private $_rules=array();
    public function getRules()
    {
        return $this->_rules;
    }
    public function setRules($rules)
    {
        foreach($rules as $rule)
        {
            if(is_array($rule) && isset($rule[0]))
            {
                $r=new MyAccessRule();
                $r->allow=$rule[0]==='allow';
                foreach(array_slice($rule,1) as $name=>$value)
                {
                    if($name==='expression' || $name==='roles' || $name==='message')
                        $r->$name=$value;
                    else
                        $r->$name=array_map('strtolower',$value);
                }
                $this->_rules[]=$r;
            }
        }
    }

}

class MyAccessRule extends CAccessRule
{
    public $params;

    protected function isParamsMatched()
    {
        $result = empty($this->params);
        $request = Yii::app()->getRequest();
        var_dump($this->verbs);

        foreach((array)$this->params as $name => $value) {
            switch($this->verbs) {
                case 'GET':
                    $result = in_array($request->getQuery($name), (array)$value);
                    break;
                case 'POST':
                    $result = in_array($request->getPost($name), (array)$value);
                    break;
                default:
                    $result = in_array($request->getParam($name), (array)$value);
            }
        }
        return $result;
    }

    public function isUserAllowed($user,$controller,$action,$ip,$verb)
    {
        if($this->isActionMatched($action)
            && $this->isUserMatched($user)
            && $this->isRoleMatched($user)
            && $this->isIpMatched($ip)
            && $this->isVerbMatched($verb)
            && $this->isControllerMatched($controller)
            && $this->isExpressionMatched($user)
            && $this->isParamsMatched())
            return $this->allow ? 1 : -1;
        else
            return 0;
    }

}
