<?php
/**
 * Created by PhpStorm.
 * User: 猫巷
 * Email:catlane@foxmail.com
 * Date: 2019/5/28
 * Time: 2:40 PM
 */

namespace Encore\ChunkFileUpload;

use Encore\Admin\Form\Field;

class ChunkFileField extends Field {
    public $view = 'chunk-file-upload::chunk-file-upload';
    protected $disk;
    protected $extensions;
    protected $mimeTypes;
    protected $fileSingleSizeLimit;

    public function __construct ( $column , array $arguments = [] ) {
        $this->disk = config ( 'chunk_file_upload.default.disk' );
        $this->extensions = config ( 'chunk_file_upload.default.extensions' );
        $this->mimeTypes = config ( 'chunk_file_upload.default.mimeTypes' );
        $this->fileSingleSizeLimit = config ( 'chunk_file_upload.default.fileSingleSizeLimit' );
        parent::__construct ( $column , $arguments );
    }


    public function disk ( $disk ) {
        $this->disk = $disk;
        return $this;
    }

    public function extensions ( $extensions ) {
        $this->extensions = $extensions;
        return $this;
    }

    public function mimeTypes ( $mimeTypes ) {
        $this->mimeTypes = $mimeTypes;
        return $this;
    }

    public function fileSingleSizeLimit ( $fileSingleSizeLimit ) {
        $this->fileSingleSizeLimit = $fileSingleSizeLimit;
        return $this;
    }

    public function render () {
        if ( ! $this->disk ) {//如果没有，就用默认的
            $driver = 'local';
        } else {
            $config = config ( 'chunk_file_upload.disks.' . $this->disk );
            if ( ! $config ) {//如果没有
                $driver = 'local';
            } else {
                $driver = $config[ 'driver' ];
            }
        }

        $name = $this->formatName ( $this->column );
        $this->script = <<<SRC
        accept = [
            {
                title: 'accepts',
                extensions: '{$this->extensions}',
                mimeTypes: '{$this->mimeTypes}' 
            }
        ];
        console.log(accept)
		chunk_file ('$name',accept,'$this->disk','$driver','{$this->fileSingleSizeLimit}');
        
SRC;

        return parent::render ();
    }
}

