<template>
    <base-layout>
        <template v-slot:header>
            <PageHeader :title="title" :breadcrumbs="breadcrumbs"></PageHeader>
        </template>
        <template v-slot:default>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="https://picsum.photos/200/300" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{user.name}}</h3>

                                <p class="text-muted text-center">{{user.email}} <br> {{user.designation_title}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                    <b>Employee ID</b> <a class="float-right">{{user.employee_id}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Branch</b> <a class="float-right">{{user.branch_title}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Department</b> <a class="float-right">{{user.department_title}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Staff Type</b> <a class="float-right">
                                        <span v-if="user.staffType==1">Supervisor</span>
                                        <span v-if="user.staffType==2">Staffs</span>
                                        <span v-if="user.staffType==3">BranchAdmin</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Nature of Employment</b> <a class="float-right"><span v-if="user.employmentType==1">Full TIme</span>
                                    <span v-if="user.employmentType==2">Part TIme</span></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Shift</b> <a class="float-right">{{user.shift_time}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Join Date</b> <a class="float-right">{{user.joindate}}</a>
                                </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Report</b></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-general-tab" data-bs-toggle="pill" data-bs-target="#pills-general" type="button" role="tab" aria-controls="pills-general" aria-selected="true">General</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-password-tab" data-bs-toggle="pill" data-bs-target="#pills-password" type="button" role="tab" aria-controls="pills-password" aria-selected="false">Credentials</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-education-tab" data-bs-toggle="pill" data-bs-target="#pills-education" type="button" role="tab" aria-controls="pills-education" aria-selected="false">Education</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-document-tab" data-bs-toggle="pill" data-bs-target="#pills-document" type="button" role="tab" aria-controls="pills-document" aria-selected="false">Document</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" v-model="user.name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Parents Name</label>
                                            <input type="text" name="name" v-model="user.f_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">DOB</label>
                                            <input type="date" name="name" v-model="user.dob" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Personal Email</label>
                                            <input type="text" name="name" v-model="user.personal_email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Citizenship</label>
                                            <input type="text" name="name" v-model="user.citizenship_number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Emergency Contact Number</label>
                                            <input type="text" name="name" v-model="user.emergency_contact_number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Citizenship</label>
                                            <input type="text" name="name" v-model="user.citizenship_number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Blood Group</label>
                                            <input type="text" name="name" v-model="user.blood_group" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="text" name="name" v-model="user.phone" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Immediate Contact Person</label>
                                            <input type="text" name="name" v-model="user.contact_person" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Contact Person Phone</label>
                                            <input type="text" name="name" v-model="user.contact_person_number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Temporary Address</label>
                                            <input type="text" name="name" v-model="user.temporary_address" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Permanent Address</label>
                                            <input type="text" name="name" v-model="user.permanent_address" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Bank Name</label>
                                            <input type="text" name="name" v-model="user.bank_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Bank Account Number</label>
                                            <input type="text" name="name" v-model="user.account_number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">PAN number</label>
                                            <input type="text" name="name" v-model="user.pan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" v-model="user.email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password" v-model="user.password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" name="password_confirmation" v-model="user.password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-education" role="tabpanel" aria-labelledby="pills-education-tab">
                                        <div class="form-group">
                                            <label for="">Education Level</label>
                                            <input type="text" name="education_level" v-model="user.education_level" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Faculty</label>
                                            <input type="text" name="faculty" v-model="user.faculty" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Institute</label>
                                            <input type="text" name="institute" v-model="user.institute" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">University/Board</label>
                                            <input type="text" name="university" v-model="user.university" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Education Year</label>
                                            <input type="text" name="education_year" v-model="user.education_year" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-document" role="tabpanel" aria-labelledby="pills-document-tab">
                                        <div class="form-group">
                                            <label for="">Photo</label>
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Citizenship</label>
                                            <input type="file" name="id_proof" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Resume</label>
                                            <input type="file" name="resume" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Offer Letter</label>
                                            <input type="file" name="offer_letter" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Appointment Letter</label>
                                            <input type="file" name="appointment_letter" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="button" class="btn btn-sm btn-primary">UPDATE</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </template>
    </base-layout>
</template>
<script>
    import PageHeader from "../../layouts/components/PageHeader.vue";
    import Profile from '../../endpoints/staffs/Profile'
    export default {
        components: {
            PageHeader
        },
        data: () => {
            return {
                title: "Profile",
                breadcrumbs: [
                    {
                        title: "Home",
                        link: "/",
                    },
                    {
                        title: "Profile",
                        link: "/staffs/profile",
                    },
                    {
                        title: 'Index',
                        link: ''
                    }
                ],
                user: {
                    name: '',
                    image: '',
                    employmentType: '',
                    branch_title: '',
                    department_title: '',
                    designation_title: '',
                    employee_id: '',
                    staffType: '',
                    shift_time: '',
                    joindate: '',
                    employee_id: '',

                    email: '',
                    password: '',
                    password_confirmation: '',

                    education_level: '',
                    faculty: '',
                    institute: '',
                    university: '',
                    education_year: '',

                    id_proof: '',
                    resume: '',
                    offer_letter: '',
                    appointment_letter: '',
                    dynamic_formData: [],
                },
            }
        },
        methods:{
            async getUserProfile()
            {   this.$Progress.start()
                try {
                    const resp = await Profile.getProfile()
                    console.log(resp.data.data)
                    this.user = resp.data.data

                } catch (error) {
                    console.log(error)
                    this.$Progress.fail()
                }
                this.$Progress.finish()
            }
        },
        mounted() {
            this.getUserProfile()
        }
    }
</script>