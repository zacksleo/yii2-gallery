<?php

namespace zacksleo\yii2\gallery\models;

/**
 * Class Query
 * @package sadovojav\gallery\models
 */
class Query extends \yii\db\ActiveQuery
{
    /**
     * @param bool $state
     * @return $this
     */
    public function active($state = true)
    {
        $this->andWhere(['status' => $state]);

        return $this;
    }
} 