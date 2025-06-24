import React ,{useState}from "react";
import Footer from "../footer/footer";
import Header from "../header/header";
import profile from '../image/profile.png'
import '../profile/profilr.css'

function Profile(){
    let data= JSON.parse (sessionStorage.getItem('user') )
    const[inputValue,setInput]=useState('')
    const [inputErr,setinputErr]=useState(false)
    const [list,listvalue]=useState([])
    
    function AddEvent(){
        if(inputValue.trim().length===0){
            setinputErr(true)
        }
        else
        {
            setinputErr(false)
            let newList=[...list,inputValue]
            listvalue(newList)
            setInput('')
        }
    }
    
    function Saveprofile(){
       sessionStorage.setItem('profile',JSON.stringify({'name':data.name ,'address':list}))
       alert('Профиль сохранен!')
    }
    
    function remove(listname){
       let removeList=list.filter((ele)=>(ele!==listname))
        listvalue(removeList)
    }
    
    return (
        <div className="progile-bg">
            <Header />
            <div className="profile-main">
                <img src={profile} className='imge' alt="Профиль"></img>
                
                <div className="profile-form-row">
                    <label>Имя пользователя:</label>
                    <p>{data.name}</p>
                </div>
                
                <div className="profile-form-row">
                    <label>Телефон:</label>
                    <p>9003079869</p>
                </div>
                
                <div className="address-section">
                    <label>Адрес:</label>
                    <div className="address-input-container">
                        <textarea 
                            rows="4" 
                            value={inputValue} 
                            onChange={(e)=>setInput(e.target.value)} 
                            placeholder='Введите ваш адрес...'
                        ></textarea>
                        {inputErr && <small style={{color:"red", display:"block"}}>Вы должны что-то написать</small>}
                        }
                        <button className="btne" onClick={AddEvent}>Добавить адрес</button>
                    </div>
                    
                    <ul className="profile-ul">
                        {list.map((ele, index)=>{
                            return (
                                <li key={index} className="profile-li">
                                    {ele} 
                                    <button onClick={()=>remove(ele)}>×</button>
                                </li>
                            )
                        })}
                    </ul>
                    
                    <button onClick={Saveprofile} className='savebutton'>Сохранить профиль</button>
                </div>
            </div>
            <Footer />
        </div>
    )
}

export default Profile