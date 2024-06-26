# Cova Forms
This is a guide to help you interact with the include blade directive from laravel to pass variables to form inputs to minimize time required and faulty forms.
### Publishing assets

Views
```
php artisan vendor:publish --tag=cova-forms
```
Livewire components
```
php artisan vendor:publish --tag=cova-livewire
```
###### Example
```blade
<form action="{{route('training.store')}}" method="post">
@csrf
@include('blocks.forms.errors')
@include('blocks.forms.input-text',            ['identifier' => "name",'label' => "Name",'required' => 'required'])
@include('blocks.forms.input-text',            ['identifier' => "speaker",'label' => "Speaker",'required' => 'required'])
@include('blocks.forms.input-text',            ['identifier' => "price",'label' => "Price",'required' => 'required'])
@include('blocks.forms.input-number',          ['identifier' => "hours",'required' => 'required'])
@include('blocks.forms.input-select',          ['identifier' => "type",'label' => "Type",'required' => 'required','options' => ['Hard Skills','Soft Skills']])
@include('blocks.forms.input-money',           ['identifier' => "total_avg_admission_cost",'label' => 'total','required' => 'required','readonly' => 'readonly','step' => '0.01'])
@include('blocks.forms.input-date',            ['identifier' => "from",'label' => "From",'required' => 'required','min' =>Carbon\Carbon::now('Europe/Lisbon')->format('Y-m-d'),'max' => ""])
@include('blocks.forms.input-date',            ['identifier' => "to",'label' => "To",'required' => 'required','min' =>Carbon\Carbon::now('Europe/Lisbon')->format('Y-m-d'),'max' => ""])
@include('blocks.forms.input-select',          ['identifier' => "status",'required' => 'required','options' => ['Expired','Finished','Ongoing','Registered']])
@include('blocks.forms.input-select',          ['identifier' => "company",'required' => 'required','options' => $companies,'key' => 'id','val' => "name"])
@include('blocks.forms.input-select-multiple', ['identifier' => "employees",'label' => "Employees",'required' => 'required','options' => $employees,'key' => 'id','val' => "known_name"])
@include('blocks.forms.input-textarea',        ['identifier' => "body",'label' => 'Description','required' => 'required','cols' => 60,'rows'=>1])
@include('blocks.forms.input-hidden',          ['identifier' => 'employee_id','val' => $employee->id,'required' => 'required'])
@include('blocks.forms.input-select',          ['identifier' => "status",'required' => 'required','options' => json_encode([['id' => 1,'name' => 'Active'],['id' => 0,'name' => 'Inactive']]),'key' => 'id','val' => "name"]) 
@include('blocks.forms.input-file',            ['identifier' => 'file_path[]','label' => 'Documents','multiple' => 'multiple','filetypes' => ['application/pdf','.doc','.docx']])
<div class="py-2">
@include('blocks.buttons.submit-create')
</div>
```
```blade
@include('blocks.forms.input-text',   ['identifier' => "position",'label' => "Job position",'required' => 'required'])
@include('blocks.forms.input-select', ['identifier' => "company",'required' => 'required','options' => $companies,'key' => 'id','val' => "name"])
@include('blocks.forms.input-select', ['identifier' => "type",'required' => 'required','options' => ['Full-time','Permanent Contract','Temporary','Part-time','Volunteer','Internship']])
@include('blocks.forms.input-select', ['identifier' => "experience",'required' => 'required','options' => ['Entry level','Associate','Senior','Internship','Director','Executive']])
@include('blocks.forms.input-select', ['identifier' => "remote",'label' => 'Remote Work','required' => 'required','options' => json_encode([['id' => 1,'name' => 'Yes'],['id' => 0,'name' => 'No'],['id' => 2,'name' => 'Mixed']]),'key' => 'id','val' => "name"])
@include('blocks.forms.input-select', ['identifier' => "status",'required' => 'required','options' => json_encode([['id' => 1,'name' => 'Active'],['id' => 0,'name' => 'Inactive']]),'key' => 'id','val' => "name"])                                 
@include('blocks.forms.input-text',   ['identifier' => "location",'required' => 'required'])
</form>
```
```blade
@include('blocks.buttons.submit-create')
@include('blocks.buttons.submit-send')
@include('blocks.buttons.submit-delete')
@include('blocks.buttons.submit-edit')
@include('blocks.buttons.submit-update')
@include('blocks.buttons.submit')
```

### File input
**Attributes**
- identifier
- label
- filetypes
- multiple
- required

**Multiple**

When multiple is used, make sure to call the identifier as an array as such:
```blade
'identifier' => 'file_path[]','multiple' => 'multiple'
```
Also make sure the form as the correct enctype="multipart/form-data"

**Filetypes**

Filetypes can be defined as such:
```blade
'filetypes' => ['application/pdf','.doc','.docx']
'filetypes' => ['image/jpeg,image/gif,image/png,application/pdf']
'filetypes' => ['jpg,png,jpeg,PNG,JPEG,JPG,GIF,gif']
```
### Select input example
Using json_encode

```blade
 @include('blocks.forms.input-select',[
 'identifier' => 'fruits_types',
 'label'      => 'Fruits',
 'options'    => json_encode(
     [
         ['id' => 0,'name' => 'Apple'],
         ['id' => 1,'name' => 'Banana'],
         ['id' => 2,'name' => 'Cherry'],
         ['id' => 3,'name' => 'Dragon Fruit'],
         ['id' => 4,'name' => 'Elder Berry'],
         ['id' => 5,'name' => 'Fig'],
     ]
 ),
 'key'     => 'id',
 'value'   => 'name',
 'current' => $basket->favorite_fruit
 ])
```
## Livewire live update inputs

**Usage example**

Input File

```blade
<div class="mt-2">Finance File</div>
@livewire('updater-file', [
'col'       => 'finance_file',
'model'     => $investor,
'rules'     => ['file','max:1024'],
'save_path' => 'people/'.$person->id.'-'.str_replace(' ', '-', strtolower($person->name)).'/investor/'.$investor->id.''
]) 
```
Input Number
```blade
@livewire('updater-number', [
'col'     => 'investment_performance',
'current' => $investor->investment_performance,
'model'   => $investor,
'step'    => 0.01
])
```
Input Text
```blade
@livewire('updater-text', [
'col'     => 'motivation',
'current' => $investor->motivation,
'model'   => $investor
])
```
Select
```blade
 @livewire('updater-select', [
'col'     => 'ownership',
'current' => $investor->ownership,
'model'   => $investor,
'label'   => false,
'options' => ['Full','Partnership']
])
```
