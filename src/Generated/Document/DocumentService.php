<?php
namespace OpenSearch\Generated\Document;
/**
 * Autogenerated by Thrift Compiler (0.10.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use OpenSearch\Thrift\Base\TBase;
use OpenSearch\Thrift\Type\TType;
use OpenSearch\Thrift\Type\TMessageType;
use OpenSearch\Thrift\Exception\TException;
use OpenSearch\Thrift\Exception\TProtocolException;
use OpenSearch\Thrift\Protocol\TProtocol;
use OpenSearch\Thrift\Protocol\TBinaryProtocolAccelerated;
use OpenSearch\Thrift\Exception\TApplicationException;


interface DocumentServiceIf {
  /**
   * @param string $docsJson
   * @param string $appName
   * @param string $tableName
   * @return \OpenSearch\Generated\Common\OpenSearchResult
   * @throws \OpenSearch\Generated\Common\OpenSearchException
   * @throws \OpenSearch\Generated\Common\OpenSearchClientException
   */
  public function push($docsJson, $appName, $tableName);
}


class DocumentServiceClient implements \OpenSearch\Generated\Document\DocumentServiceIf {
  protected $input_ = null;
  protected $output_ = null;

  protected $seqid_ = 0;

  public function __construct($input, $output=null) {
    $this->input_ = $input;
    $this->output_ = $output ? $output : $input;
  }

  public function push($docsJson, $appName, $tableName)
  {
    $this->send_push($docsJson, $appName, $tableName);
    return $this->recv_push();
  }

  public function send_push($docsJson, $appName, $tableName)
  {
    $args = new \OpenSearch\Generated\Document\DocumentService_push_args();
    $args->docsJson = $docsJson;
    $args->appName = $appName;
    $args->tableName = $tableName;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'push', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('push', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_push()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\OpenSearch\Generated\Document\DocumentService_push_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \OpenSearch\Generated\Document\DocumentService_push_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    if ($result->error !== null) {
      throw $result->error;
    }
    if ($result->e !== null) {
      throw $result->e;
    }
    throw new \Exception("push failed: unknown result");
  }

}


// HELPER FUNCTIONS AND STRUCTURES

class DocumentService_push_args {
  static $_TSPEC;

  /**
   * @var string
   */
  public $docsJson = null;
  /**
   * @var string
   */
  public $appName = null;
  /**
   * @var string
   */
  public $tableName = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'docsJson',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'appName',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'tableName',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['docsJson'])) {
        $this->docsJson = $vals['docsJson'];
      }
      if (isset($vals['appName'])) {
        $this->appName = $vals['appName'];
      }
      if (isset($vals['tableName'])) {
        $this->tableName = $vals['tableName'];
      }
    }
  }

  public function getName() {
    return 'DocumentService_push_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->docsJson);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->appName);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->tableName);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('DocumentService_push_args');
    if ($this->docsJson !== null) {
      $xfer += $output->writeFieldBegin('docsJson', TType::STRING, 1);
      $xfer += $output->writeString($this->docsJson);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->appName !== null) {
      $xfer += $output->writeFieldBegin('appName', TType::STRING, 2);
      $xfer += $output->writeString($this->appName);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->tableName !== null) {
      $xfer += $output->writeFieldBegin('tableName', TType::STRING, 3);
      $xfer += $output->writeString($this->tableName);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class DocumentService_push_result {
  static $_TSPEC;

  /**
   * @var \OpenSearch\Generated\Common\OpenSearchResult
   */
  public $success = null;
  /**
   * @var \OpenSearch\Generated\Common\OpenSearchException
   */
  public $error = null;
  /**
   * @var \OpenSearch\Generated\Common\OpenSearchClientException
   */
  public $e = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        0 => array(
          'var' => 'success',
          'type' => TType::STRUCT,
          'class' => '\OpenSearch\Generated\Common\OpenSearchResult',
          ),
        1 => array(
          'var' => 'error',
          'type' => TType::STRUCT,
          'class' => '\OpenSearch\Generated\Common\OpenSearchException',
          ),
        2 => array(
          'var' => 'e',
          'type' => TType::STRUCT,
          'class' => '\OpenSearch\Generated\Common\OpenSearchClientException',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['success'])) {
        $this->success = $vals['success'];
      }
      if (isset($vals['error'])) {
        $this->error = $vals['error'];
      }
      if (isset($vals['e'])) {
        $this->e = $vals['e'];
      }
    }
  }

  public function getName() {
    return 'DocumentService_push_result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 0:
          if ($ftype == TType::STRUCT) {
            $this->success = new \OpenSearch\Generated\Common\OpenSearchResult();
            $xfer += $this->success->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->error = new \OpenSearch\Generated\Common\OpenSearchException();
            $xfer += $this->error->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->e = new \OpenSearch\Generated\Common\OpenSearchClientException();
            $xfer += $this->e->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('DocumentService_push_result');
    if ($this->success !== null) {
      if (!is_object($this->success)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
      $xfer += $this->success->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->error !== null) {
      $xfer += $output->writeFieldBegin('error', TType::STRUCT, 1);
      $xfer += $this->error->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->e !== null) {
      $xfer += $output->writeFieldBegin('e', TType::STRUCT, 2);
      $xfer += $this->e->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class DocumentServiceProcessor {
  protected $handler_ = null;
  public function __construct($handler) {
    $this->handler_ = $handler;
  }

  public function process($input, $output) {
    $rseqid = 0;
    $fname = null;
    $mtype = 0;

    $input->readMessageBegin($fname, $mtype, $rseqid);
    $methodname = 'process_'.$fname;
    if (!method_exists($this, $methodname)) {
      $input->skip(TType::STRUCT);
      $input->readMessageEnd();
      $x = new TApplicationException('Function '.$fname.' not implemented.', TApplicationException::UNKNOWN_METHOD);
      $output->writeMessageBegin($fname, TMessageType::EXCEPTION, $rseqid);
      $x->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
      return;
    }
    $this->$methodname($rseqid, $input, $output);
    return true;
  }

  protected function process_push($seqid, $input, $output) {
    $args = new \OpenSearch\Generated\Document\DocumentService_push_args();
    $args->read($input);
    $input->readMessageEnd();
    $result = new \OpenSearch\Generated\Document\DocumentService_push_result();
    try {
      $result->success = $this->handler_->push($args->docsJson, $args->appName, $args->tableName);
    } catch (\OpenSearch\Generated\Common\OpenSearchException $error) {
      $result->error = $error;
        } catch (\OpenSearch\Generated\Common\OpenSearchClientException $e) {
      $result->e = $e;
    }
    $bin_accel = ($output instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($output, 'push', TMessageType::REPLY, $result, $seqid, $output->isStrictWrite());
    }
    else
    {
      $output->writeMessageBegin('push', TMessageType::REPLY, $seqid);
      $result->write($output);
      $output->writeMessageEnd();
      $output->getTransport()->flush();
    }
  }
}

