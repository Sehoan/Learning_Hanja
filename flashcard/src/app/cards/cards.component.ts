import { Component, OnInit } from '@angular/core';
import { HttpService } from '../http.service';

@Component({
  selector: 'app-cards',
  templateUrl: './cards.component.html',
  styleUrls: ['./cards.component.css'],
})
export class CardsComponent implements OnInit {
  constructor(private httpService: HttpService) {
    this.httpService
      .getWordbook()
      .subscribe((response) => console.log(response));
  }

  ngOnInit(): void {}

  getMyWordbook(): void {
    this.httpService
      .getWordbook()
      .subscribe((response) => console.log(response));
  }
}
