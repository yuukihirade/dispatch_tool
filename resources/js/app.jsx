import './bootstrap';
// import './calendar';
import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom/client";
import { format, getDate, getMonth, getYear } from 'date-fns'




const DateTimeDetail = ({selectedDispatch}) => {
    return(
      <div className="card">
        <div className="card-header">日時</div>
        <div className="card-body">
          <h5 className="card-title">日付</h5>
          <p className="card-text">{selectedDispatch && format(new Date(selectedDispatch.start_datetime), 'yyyy/MM/dd')}</p>
        </div>
        <div className="card-body">
          <h5 className="card-title">時間帯</h5>
          <p className="card-text">{selectedDispatch && format(new Date(selectedDispatch.start_datetime), 'HH:mm') + ' ~ '}  {selectedDispatch && format(new Date(selectedDispatch.end_datetime), 'HH:mm')}</p>
        </div>
      </div>
    );
}


const Template = () => {
  
  const [drivers, setDrivers] = useState( [] );
  const [dispatchRequests, setDispatchRequests] = useState( [] );
  const [jsToday, setJsToday] = useState('');
  console.log({drivers});
  console.log({dispatchRequests});
  
  
  
  useEffect(() => {
    const url = '/api/drivers';
    fetch(url)
      .then(response => response.json())
      .then(data => {
        console.log({data});
        setDrivers(Object.values(data['drivers']));
        setDispatchRequests(Object.values(data['dispatch_requests']).sort(compareStartDatetime));
        // setJsToday(data.today.toISOString());
        setJsToday(data.today);
        
        // console.log(driver);
        // console.log(data[0][0]);
        })
  }, []);
  
  console.log({jsToday});
  // console.log(dispatchRequests[3][0]);
  
  const [selectedDispatch, setSelectedDispatch] = useState(undefined);
  const [selectedId, setSelectedId] = useState(undefined);
  
  
  const compareStartDatetime = (a,b) => {
    if(a.start_datetime > b.start_datetime){
      return 1;
    }
    if(a.start_datetime < b.start_datetime){
      return -1;
    }
    return 0;
  }
  
  
  
  const handleClick = (e) => {
    console.log(e.target.id);
    const clickedId = e.target.id; //クリックされた要素のIDを取得
    setSelectedId(clickedId);
    console.log(selectedId);
    setSelectedDispatch(dispatchRequests.find((request) => request.id == clickedId));
    console.log(selectedDispatch);
    // formatDate(selectedDispatch.start_datetime);
    
  }
  
  const [selectedAddress, setSelectedAddress] = useState("");
  
  const handleMap = (e) => {
    console.log(e.target.id);
    const renderingAddress = selectedDispatch.location.address;
    setSelectedAddress(renderingAddress);
    console.log({renderingAddress});
    console.log({selectedAddress});
  }
  
  
  return(
    <div className="container">
  <div className="row">
    <div className="col">
      <h1>本日の配車</h1>
    </div>
  </div>
  <div className="row">
    <div className="table-responsive, col">
      <table className="table">
        <thead>
          <tr>
            <th scope="col">{jsToday && format(new Date(jsToday), 'yyyy/MM/dd')}</th>
          </tr>
          <tr>
            <th scope="col">運転手 / 配車順</th>
            <th scope="col">1</th>
            <th scope="col">2</th>
            <th scope="col">3</th>
            <th scope="col">4</th>
            <th scope="col">5</th>
            <th scope="col">6</th>
            <th scope="col">7</th>
            <th scope="col">8</th>
          </tr>
        </thead>
        <tbody>
          {drivers.map(driver => (
          <tr key={driver.id}>
            <th scope="row">{driver.name}</th>
            {
              dispatchRequests.map(dispatch => (
                  dispatch.driver_id == driver.id && <td><button id={dispatch.id} onClick={ handleClick } key={dispatch.id}>{dispatch.customer.name + ' (' + dispatch.location.name + ')'}</button></td>
                )
              )
            }
          </tr>
          ))}
        </tbody>
      </table>
    </div>
  </div>
  <div className="row">
    {/* Cellをクリックしたときに表示される現場詳細 */}
    <DateTimeDetail selectedDispatch={selectedDispatch}/>
    <div className="card">
      <div className="card-header">顧客情報</div>
      <div className="card-body">
        <h5 className="card-title">引取先 (現場)</h5>
        <p className="card-text">{selectedDispatch && selectedDispatch.customer.name} ({selectedDispatch && selectedDispatch.location.name})</p>
        {/*
        */}
        {/* 現場詳細画面へ遷移 */}
        <a href="#" onClick={handleMap} className="btn btn-primary" id={selectedDispatch && selectedDispatch.id}>
          現場地図
        </a>
        <iframe src={`https://maps.google.co.jp/maps?output=embed&q=${selectedAddress}&z=16`} width="600" height="400" frameborder="0" scrolling="no" ></iframe>
      </div>
    </div>
    <div className="card">
      <div className="card-header">車両</div>
      <div className="card-body">
        <h5 className="card-title">車種</h5>
        <p className="card-text">{selectedDispatch && selectedDispatch.size_category.name + 't'}{selectedDispatch && selectedDispatch.ability.name}</p>
        <h5 className="card-title">車番</h5>
        <p className="card-text">{selectedDispatch && selectedDispatch.car.registration_number}</p>
      </div>
    </div>
    <div className="card">
      <div className="card-body">
        <h5 className="card-title">持ち物</h5>
        <p className="card-text">{selectedDispatch && selectedDispatch.item}</p>
      </div>
    </div>
    <div className="card">
      <div className="card-body">
        <h5 className="card-title">引取方法</h5>
        <p className="card-text">{selectedDispatch && selectedDispatch.method}</p>
      </div>
    </div>
    <div className="card">
      <div className="card-body">
        <h5 className="card-title">担当者</h5>
        <p className="card-text">{selectedDispatch && selectedDispatch.user.name}</p>
      </div>
    </div>
    <div className="card">
      <div className="card-body">
        <h5 className="card-title">詳細説明 (画像)</h5>
        <p className="card-text">{selectedDispatch && selectedDispatch.description}</p>
        <p className="card-text">
          <small className="text-muted">{selectedDispatch && format(new Date(selectedDispatch.updated_at), 'yyyy/MM/dd  HH:mm') + '最終更新'}</small>
        </p>
      </div>
      {selectedDispatch && selectedDispatch.image_path && (
      selectedDispatch.image_path.split(',').map((img) => (
      <img src={`../storage/image/${img}`}  className="card-img-bottom" alt="card-img-bottom" />
      ))
      
      )}
    </div>
  </div>
</div>
  );
}

const root = ReactDOM.createRoot(document.getElementById("react_app"));
root.render(<Template />);