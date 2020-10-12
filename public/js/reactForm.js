class SignupForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      name: '',
      email: '',
      password: '',
      phone: '',
      nameError: '',
      emailError: '',
      passwordError: '',
      phoneError: '',
      feedback: ''
    };
  }

  handleNameChange = e => {
    this.setState({ name: event.target.value }, () => {
      this.validateName();
    });
  };

  handleEmailChange = e => {
    this.setState({ email: event.target.value }, () => {
      this.validateEmail();
    });
  };

  handlePasswordChange = e => {
  this.setState({ password: event.target.value }, () => {
      this.validatePassword();
    });
  };

  handlePhoneChange = e => {
  this.setState({ phone: event.target.value }, () => {
      this.validatePhone();
    });
  };

  validateName = () => {
    const { name } = this.state;
 //searches name for numbers/special characteers and displays error if there are.
    var invalidChars = "!@#$%^&*()+=-[0123456789]\\\';,./{}|\":<>?";
      		for (var i = 0; i < name.length; i++) {
      			if (invalidChars.indexOf(name.charAt(i)) != -1) {
      				this.setState({nameError: 'Only Input Letters (no numbers or special characters)'})
      			} else if ((name.length < 3)){ //the name must be longer than 3 characters
          			this.setState({nameError: 'Name must be more than 3 characters'});
              } else {
                  this.setState({nameError: ''}); //displays no errors if valid input
                }
  }
}
//if the email doesn't contain an @ or a dot then this error will display
  validateEmail = () => {
    const { email } = this.state;
    if ((email.length < 3)){ //if email isn't longer than 3 characters then this will display
      this.setState({emailError: 'Email Must be longer than 3 characters'})
    }
    else if (email.includes("@") && email.includes(".")){
      this.setState({emailError: ''});
    } else {
      this.setState({emailError: 'Email must include an @ and a dot'});
    }
  }

//password error for if the password isn't 6 characters or longer
   validatePassword = () => {
    const { password } = this.state;
    this.setState({passwordError: password.length >= 6 ? null : 'Password must be 6 characters or longer'
    });

    if((password.length < 6)){
      this.setState({passwordError: 'Password must be 6 characters minimum'})
    } else {
      this.setState({phoneError: ''})
    }

  }

  validatePhone = () => {
   const { phone } = this.state;

   if ((phone.length < 10 || phone.length > 10)){ //if the phone number isn't exactly 10 characters then this will display
     this.setState({phoneError: 'Phone Number must only be 10 characters'})
   } else {
     this.setState({phoneError: ''})
   }
 }

 isDisabled = () => {
   const {name, nameError, email, emailError, password, passwordError, phone, phoneError} = this.state
// if there are no errors displaying and all the inputs are filled then the submit button will be available
  return !nameError && name && !emailError && email && !passwordError && password && !phoneError && phone
 }

  handleSubmit = e => {
    event.preventDefault();
 //this sends the input data off and responds with the php body data
    $.ajax({
    type: "POST",
    url: "/register",
    data: {name: this.state.name, email: this.state.email, password: this.state.password, phone: this.state.phone},
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
  },
    success: function(data){
      alert(JSON.stringify(data)); //this is the php's response (ie. user added/ email already taken etc.)
    }, error: function() {
      console.log("error");
    }
});

  //clears the input field on submission and provedes success feedback
    this.setState({name: '', email: '', password: '', phone: ''});
  }


  render() {
    return (
      <form id='signForm' className= 'signForm' onSubmit={this.handleSubmit} >
        <div className='form'>
          <label htmlFor='name'>Name: </label>
          <input
            name='name'
            className={`form-control ${this.state.nameError ? 'is-invalid' : ''}`}
            id='name'
            type= 'text'
            placeholder='Enter name'
            value={this.state.name}
            onChange={this.handleNameChange}
            onBlur={this.validateName}
          />
          <div className='invalid-feedback'>{this.state.nameError}</div>
        </div>
        <div className='form'>
          <label htmlFor='email'>Email: </label>
          <input
            name='email'
            className={`form-control ${this.state.emailError ? 'is-invalid' : ''}`}
            id='email'
            placeholder='Enter email'
            value={this.state.email}
            onChange={this.handleEmailChange}
            onBlur={this.validateEmail}
          />
          <div className='invalid-feedback'>{this.state.emailError}</div>
        </div>
        <div className='form'>
          <label htmlFor='password'>Password: </label>
          <input
            name='password'
            className={`form-control ${this.state.passwordError ? 'is-invalid' : ''}`}
            id='password'
            placeholder='Enter password'
            value={this.state.password}
            onChange={this.handlePasswordChange}
            onBlur={this.validatePassword}
            type = 'password'
          />
          <div className='invalid-feedback'>{this.state.passwordError}</div>
        </div>
        <div className='form'>
          <label htmlFor='phone'>Phone Number: </label>
          <input
            name='phone'
            className={`form-control ${this.state.emailError ? 'is-invalid' : ''}`}
            id='phone'
            placeholder='Enter Phone Number'
            value={this.state.phone}
            onChange={this.handlePhoneChange}
            onBlur={this.validatePhone}
            type="number"
            pattern="[0-9]*"
            //this prevents the use of the e, E, dots, + and -
            onKeyDown={ e => ( e.keyCode === 69 || e.keyCode === 190 || e.keyCode === 46 || e.keyCode === 189 || e.keyCode === 107 || e.keyCode === 110 ) && e.preventDefault() }
          />
          <div className='invalid-feedback'>{this.state.phoneError}</div>
        </div>
        <button name="submit" type='submit' className='signupSubmit' disabled={!this.isDisabled()}>
          Submit
        </button>
        <div className='feedback'>{this.state.feedback}</div>
      </form>
    );
  }
}

ReactDOM.render(<SignupForm />, document.getElementById('root'))
