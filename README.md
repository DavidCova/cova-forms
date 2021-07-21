<form action="{{route('training.store')}}" method="post">
## @csrf
@include('blocks.forms.errors')
@include('blocks.forms.input-text', ['identifier' => "name",'label' => "Name",'required' => 'required'])
@include('blocks.forms.input-text', ['identifier' => "speaker",'label' => "Speaker",'required' => 'required'])
@include('blocks.forms.input-text', ['identifier' => "price",'label' => "Price",'required' => 'required'])
@include('blocks.forms.input-number', ['identifier' => "hours",'required' => 'required'])
@include('blocks.forms.input-select', ['identifier' => "type",'label' => "Type",'required' => 'required','options' => ['Hard Skills','Soft Skills']])
@include('blocks.forms.input-money', ['identifier' => "total_avg_admission_cost",'label' => 'total','required' => 'required','readonly' => 'readonly','step' => '0.01'])
@include('blocks.forms.input-date', ['identifier' => "from",'label' => "From",'required' => 'required','min' =>Carbon\Carbon::now('Europe/Lisbon')->format('Y-m-d'),'max' => ""])
@include('blocks.forms.input-date', ['identifier' => "to",'label' => "To",'required' => 'required','min' =>Carbon\Carbon::now('Europe/Lisbon')->format('Y-m-d'),'max' => ""])
@include('blocks.forms.input-select', ['identifier' => "status",'required' => 'required','options' => ['Expired','Finished','Ongoing','Registered']])
@include('blocks.forms.input-select', ['identifier' => "company",'required' => 'required','options' => $companies,'key' => 'id','val' => "name"])
@include('blocks.forms.input-select-multiple', ['identifier' => "employees",'label' => "Employees",'required' => 'required','options' => $employees,'key' => 'id','val' => "known_name"])
@include('blocks.forms.input-textarea', ['identifier' => "body",'label' => 'Description','required' => 'required','cols' => 60,'rows'=>1])
@include('blocks.forms.input-hidden',['identifier' => 'employee_id','val' => $employee->id,'required' => 'required'])
@include('blocks.forms.input-select', ['identifier' => "status",'required' => 'required','options' => json_encode([['id' => 1,'name' => 'Active'],['id' => 0,'name' => 'Inactive']]),'key' => 'id','val' => "name"]) 
<div class="py-2">
@include('blocks.buttons.submit-create')
</div>

@include('blocks.forms.input-text', ['identifier' => "position",'label' => "Job position",'required' => 'required'])
@include('blocks.forms.input-select', ['identifier' => "company",'required' => 'required','options' => $companies,'key' => 'id','val' => "name"])
@include('blocks.forms.input-select', ['identifier' => "type",'required' => 'required','options' => ['Full-time','Permanent Contract','Temporary','Part-time','Volunteer','Internship']])
@include('blocks.forms.input-select', ['identifier' => "experience",'required' => 'required','options' => ['Entry level','Associate','Senior','Internship','Director','Executive']])
@include('blocks.forms.input-select', ['identifier' => "remote",'label' => 'Remote Work','required' => 'required','options' => json_encode([['id' => 1,'name' => 'Yes'],['id' => 0,'name' => 'No'],['id' => 2,'name' => 'Mixed']]),'key' => 'id','val' => "name"])
@include('blocks.forms.input-select', ['identifier' => "status",'required' => 'required','options' => json_encode([['id' => 1,'name' => 'Active'],['id' => 0,'name' => 'Inactive']]),'key' => 'id','val' => "name"])                                 
@include('blocks.forms.input-text', ['identifier' => "location",'required' => 'required'])
</form>

@include('blocks.buttons.submit-create')
@include('blocks.buttons.submit-send')
@include('blocks.buttons.submit-delete')
@include('blocks.buttons.submit-edit')
@include('blocks.buttons.submit-update')
@include('blocks.buttons.submit')
