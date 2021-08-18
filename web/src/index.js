import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';
import {ContextWrapper} from "./context";
import {BrowserRouter, Route, Switch} from "react-router-dom";
import Home from "./containers/Home/Home";
import CourseTable from "./containers/Course/CourseTable";
import NoMatch from "./components/NoMatch/NoMatch";
import Login from "./containers/Login/Login";
import 'semantic-ui-css/semantic.min.css'
import Logout from "./containers/Logout/Logout";
import CourseForm from "./containers/Course/CourseForm";
import UserTable from "./containers/User/UserTable";
import UserForm from "./containers/User/UserForm";
import LectureTable from "./containers/Lecture/LectureTable";
import LectureForm from "./containers/Lecture/LectureForm";
import HomeworkForm from "./containers/Homework/HomeworkForm";
import HomeworkTable from "./containers/Homework/HomeworkTable";
import PurchaseTable from "./containers/Purchase/PurchaseTable";
import PurchaseForm from "./containers/Purchase/PurchaseForm";

ReactDOM.render(
    <ContextWrapper>
        <div>

            <BrowserRouter>
                <div>
                    <App/>
                    <Switch>

                        <Route exact path="/" component={App}/>
                        <Route exact path="/login" component={Login}/>
                        <Route exact path="/home" component={Home}/>

                        <Route exact path="/courses" component={CourseTable}/>
                        <Route exact path="/courses/:id" component={CourseForm}/>

                        <Route exact path="/lectures" component={LectureTable}/>
                        <Route exact path="/lectures/:id" component={LectureForm}/>

                        <Route exact path="/homeworks" component={HomeworkTable}/>
                        <Route exact path="/homeworks/:id" component={HomeworkForm}/>

                        <Route exact path="/purchases" component={PurchaseTable}/>
                        <Route exact path="/purchases/:id" component={PurchaseForm}/>

                        <Route exact path="/users" component={UserTable}/>
                        <Route exact path="/users/:id" component={UserForm}/>

                        <Route exact path="/logout" component={Logout}/>
                        <Route path="*" compoenent={NoMatch}/>


                    </Switch>
                </div>
            </BrowserRouter>
        </div>

    </ContextWrapper>
    ,
    document.getElementById('root')
)
;

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
