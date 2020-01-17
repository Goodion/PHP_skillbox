<?php

namespace importExport;

interface Reader
{
    public function read();
}

interface Writer
{
    public function write(array $data);
}

interface Converter
{
    public function convert($item);
}

class Import 
{
    public $reader;
    public $writer;
    public $converters;

    public function from(Reader $reader)
    {
        $this->reader = $reader;
        return $this->reader;
    }

    public function to(Writer $writer)
    {
        $this->writer = $writer;
        return $this->writer;
    }

    public function with(Converter $converter)
    {
        $this->converters[] = $converter;
        return $this->converters;
    }

    public function execute()
    {
        $data = $this->reader->read();

        foreach ($data as $item) {
            
            foreach($this->converters as $converter) {
                $item = $converter->convert($item);
            }
            
            $newData[] = $item;
        }

        $this->writer->write($newData);
    }
}

class FileReader implements Reader
{
    private $file = 'file.txt';
    
    public function read()
    {
        $fp = fopen($this->file, 'r');
        
        if ($fp) {
            $data = fgets($fp, 50000);
        }

        fclose($fp);

        $data = explode(' ', $data);

        return $data;
    }
}

class StringReader implements Reader
{
    private $string = 'Nam fringilla rhoncus elit in tincidunt. In bibendum auctor nisl vitae sagittis. Duis auctor, turpis nec viverra tristique, turpis nulla porttitor';
    
    public function read()
    {
        $data = explode(' ', $this->string);

        return $data;
    }
}

class FileWriter implements Writer
{
    private $file = 'result.txt';

    public function write(array $data)
    {
        $fp = fopen($this->file, 'a');

        $data = implode(' ', $data);

        $success = fwrite($fp, $data);
        
        if ($success) {
            echo 'Данные в файл успешно занесены.';
        } else {
            echo 'Ошибка при записи в файл.';
        }

        fclose($fp);
    }
}

class StringWriter implements Writer
{
    public function write(array $data)
    {
        $resultString = implode(' ', $data);
        
        echo('Данные в строку успешно занесены:' . PHP_EOL);
        echo($resultString . PHP_EOL);
        return $resultString;
    }
}

class UpperCaseStringConverter implements Converter
{
    public function convert($item)
    {
        $convertedItem = strtoupper($item);
        return $convertedItem;
    }
}

class LettersShuffleConverter implements Converter
{
    public function convert($item)
    {
        $convertedItem = str_shuffle($item);
        return $convertedItem;
    }
}

$import = new Import();
$import->from(new StringReader);
$import->to(new StringWriter);
$import->with(new UpperCaseStringConverter);
$import->execute();

$import2 = new Import();
$import2->from(new FileReader);
$import2->to(new FileWriter);
$import2->with(new UpperCaseStringConverter);
$import2->with(new LettersShuffleConverter); 
$import2->execute();
