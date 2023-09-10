import './bootstrap';
// import './calendar';
import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom/client";
import { format } from 'date-fns'


const handleCellClick = (e) => {
  console.log('hoge');
}

const DispatchCell = ({dispatchName}) => {
  
  return(
  <td><button onClick={handleCellClick}>{dispatchName}</button></td>  
  );
}

const DriverDispatch = ({driverName}) => {
    
    return(
        <tr>
          <th scope="row">{driverName}</th>
          <DispatchCell dispatchName="hoge" />
          <DispatchCell dispatchName="hoge" />
          <DispatchCell dispatchName="hoge" />
          <DispatchCell dispatchName="hoge" />
          <DispatchCell dispatchName="hoge" />
          <DispatchCell dispatchName="hoge" />
          <DispatchCell dispatchName="foo" />
          <DispatchCell dispatchName="hoo" />
        </tr>
    );
}

const ColInOrder = ({...props}) => {
    
    const {rowName, colName} = props;
    
    return(
        <tr>
          <th scope="col">{rowName} / {colName}</th>
          <th scope="col">1</th>
          <th scope="col">2</th>
          <th scope="col">3</th>
          <th scope="col">4</th>
          <th scope="col">5</th>
          <th scope="col">6</th>
          <th scope="col">7</th>
          <th scope="col">8</th>
        </tr>
    );
}

const DriverTable = () => {
    
    return(
    <div className="row">
      <div className="table-responsive col">
        <table className="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" colSpan={4}>
                午前
              </th>
              <th scope="col" colSpan={4}>
                午後
              </th>
            </tr>
            <ColInOrder rowName="運転手" colName="配車順" />
          </thead>
          <tbody>
            <DriverDispatch driverName="川口" />
            <DriverDispatch driverName="内海" />
            <DriverDispatch driverName="佐々木" />
          </tbody>
        </table>
      </div>
    </div>
    );
}

const DateTime = ({...dateProps}) => {
    
    const {date, startTime, endTime} = dateProps;
    
    return(
    <div className="card">
        <div className="card-header">日時</div>
        <div className="card-body">
          <h5 className="card-title">日付</h5>
          <p className="card-text">{date}</p>
        </div>
        <div className="card-body">
          <h5 className="card-title">時間帯</h5>
          <p className="card-text">{startTime} ~ {endTime}</p>
        </div>
    </div>
    );
}

const CustomerInfomation = ({...customerProps}) => {
    
    const {customerName, locationName, locationMap} = customerProps;
    
    return(
    <div className="card">
        <div className="card-header">顧客情報</div>
        <div className="card-body">
          <h5 className="card-title">引取先 (現場名)</h5>
          <p className="card-text">{customerName} ({locationName})</p>
          {/* 現場詳細画面へ遷移 */}
          <a href={locationMap} className="btn btn-primary">
            現場地図
          </a>
        </div>
    </div>
    );
}

const CarInfomation = ({...carProps}) => {
    
    const {sizeCategory, ability, registrationNumber} = carProps;
    
    return(
    <div className="card">
        <div className="card-header">車両情報</div>
        <div className="card-body">
          <h5 className="card-title">車種</h5>
          <p className="card-text">{sizeCategory}t {ability}</p>
          <h5 className="card-title">車番</h5>
          <p className="card-text">{registrationNumber}</p>
        </div>
    </div>
    );
}

const OtherInfomation = ({...otherProps}) => {
    
    const {item, method, user, description, image} = otherProps;
    
    return(
    <div>
      <div className="card">
        <div className="card-body">
          <h5 className="card-title">持ち物</h5>
          <p className="card-text">{item}</p>
        </div>
      </div>
      <div className="card">
        <div className="card-body">
          <h5 className="card-title">引取方法</h5>
          <p className="card-text">{method}</p>
        </div>
      </div>
      <div className="card">
        <div className="card-body">
          <h5 className="card-title">担当者</h5>
          <p className="card-text">{user}</p>
        </div>
      </div>
      <div className="card">
        <div className="card-body">
          <h5 className="card-title">詳細説明 (画像)</h5>
          <p className="card-text">{description}</p>
        </div>
        <img src={image} className="card-img-bottom" alt="card-img-bottom" />
      </div>
    </div>
    );
}

const DetailDispatch = () => {
    return(
    <div>
        <DateTime 
            date="8月10日"
            startTime="10:00"
            endTime="12:00"
        />
        <CustomerInfomation 
            customerName="丸一解体"
            locationName="藤枝"
            locationMap="#"
        />
        <CarInfomation 
            sizeCategory="10"
            ability="ヒアブ"
            registrationNumber="浜松 た ..20"
        />
        <OtherInfomation 
            item="ハコ×4"
            method="ヒアブで積込"
            user="村松"
            description="現場狭いです。気を付けて。"
        />
    </div>
    );
}

function App() {
    return (
    <div>
        <DriverTable />
        <DetailDispatch />
    </div>
    );
}

const Template = () => {
  
  const [drivers, setDrivers] = useState( [] );
  const [dispatchRequests, setDispatchRequests] = useState( [] );
  console.log({drivers});
  console.log({dispatchRequests});
  
  useEffect(() => {
    const url = '/api/drivers';
    fetch(url)
      .then(response => response.json())
      .then(data => {
        console.log({data});
        setDrivers(Object.values(data['drivers']));
        setDispatchRequests(Object.values(data['dispatch_requests']));
        
        // console.log(driver);
        // console.log(data[0][0]);
        })
  }, []);
  
  // console.log(dispatchRequests[3][0]);
  
  const [selectedDispatch, setSelectedDispatch] = useState(undefined);
  const [selectedId, setSelectedId] = useState(undefined);
  
  const formatDate = (inputDate) => {
    const date = new Date(inputDate);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    console.log(`${year}年${month}月${day}日`);
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
            <th scope="col">#</th>
            <th scope="col" colSpan={4}>
              午前
            </th>
            <th scope="col" colSpan={4}>
              午後
            </th>
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
    <div className="card">
      <div className="card-header">日時</div>
      <div className="card-body">
        <h5 className="card-title">日付</h5>
        <p className="card-text">{selectedDispatch && format(new Date(selectedDispatch.start_datetime), 'yyyy/MM/dd')}</p>
      </div>
      <div className="card-body">
        <h5 className="card-title">時間帯</h5>
        <p className="card-text">{selectedDispatch && format(new Date(selectedDispatch.start_datetime), 'HH:mm')} ~ {selectedDispatch && format(new Date(selectedDispatch.end_datetime), 'HH:mm')}</p>
      </div>
    </div>
    <div className="card">
      <div className="card-header">顧客情報</div>
      <div className="card-body">
        <h5 className="card-title">引取先 (現場)</h5>
        <p className="card-text">{selectedDispatch && selectedDispatch.customer.name} ({selectedDispatch && selectedDispatch.location.name})</p>
        {/*
        */}
        {/* 現場詳細画面へ遷移 */}
        <a href="#" className="btn btn-primary">
          現場地図
        </a>
      </div>
    </div>
    <div className="card">
      <div className="card-header">車両</div>
      <div className="card-body">
        <h5 className="card-title">車種</h5>
        <p className="card-text">{selectedDispatch && selectedDispatch.size_category.name}t{selectedDispatch && selectedDispatch.ability.name}</p>
        <h5 className="card-title">車番</h5>
        <p className="card-text">{selectedDispatch && selectedDispatch.car.registration_number}</p>
      </div>
    </div>
    <div className="card">
      <div className="card-body">
        <h5 className="card-title">持ち物</h5>
        <p className="card-text">ハコ x10</p>
      </div>
    </div>
    <div className="card">
      <div className="card-body">
        <h5 className="card-title">引取方法</h5>
        <p className="card-text">リフト</p>
      </div>
    </div>
    <div className="card">
      <div className="card-body">
        <h5 className="card-title">担当者</h5>
        <p className="card-text">石神</p>
      </div>
    </div>
    <div className="card">
      <div className="card-body">
        <h5 className="card-title">詳細説明 (画像)</h5>
        <p className="card-text">現場狭��です。気を付けて</p>
        <p className="card-text">
          <small className="text-muted">Last updated 3 mins ago</small>
        </p>
      </div>
      <img src="#" className="card-img-bottom" alt="card-img-bottom" />
    </div>
  </div>
</div>
  );
}

const root = ReactDOM.createRoot(document.getElementById("react_app"));
root.render(<Template />);